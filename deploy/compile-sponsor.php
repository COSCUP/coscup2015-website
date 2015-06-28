<?php
function make_sponsor($SPON)
{
    return array(
        'name' => trim($SPON[0]),
        'level' => trim($SPON[1]),
        'url' => trim($SPON[2]),
        'logoUrl' => trim($SPON[3]),
        'desc' => trim($SPON[4]),
        'enName' => trim($SPON[5]),
        'enDesc' => trim($SPON[6]),
        'zhCnName' => trim($SPON[7]),
        'zhCnDesc' => trim($SPON[8])
    );
}

function validate_sponsor_data($sponsor)
{
    $ret = TRUE;

    if (!isset($sponsor['name']) || $sponsor['name'] == "") {
        print "SKIP unknown sponsor. Please fill the 'name' field";
        return FALSE;
    }

    $checklist = array(
        'level',
        'url',
        'logoUrl',
        //'desc'
    );

    foreach ($checklist as $item) {
        if (!isset($sponsor[$item]) || $sponsor[$item] == "") {
            print "SKIP sponsor " . $sponsor['name'];
            print " because '" . $item . "' is empty.\n";
            $ret = FALSE;
        }
    }

    // Check if logo file exists
    $logoPath = WEBSITE_PATH . SPONSOR_LOGO_RELATIVE_PATH . $sponsor['logoUrl'];
    if ($sponsor['logoUrl'] != "" && !file_exists($logoPath)) {
        print "SKIP sponsor " . $sponsor['name'];
        print " because logo '" . $sponsor['logoUrl'] . "' doesn't exist.\n";
        $ret = FALSE;
    }
    return $ret;
}

function get_sponsors_list_from_gdoc($source_url)
{
    $handle = @fopen($source_url, 'r');

    if (!$handle) {
        return FALSE; // failed
    }

    $SPONS = array();

    // name, level, url, logoUrl, desc, enName, enDesc, zhCnName, zhCnDesc
    while (($SPON = fgetcsv($handle)) !== FALSE) {

        $sponsor = make_sponsor($SPON);
        if (!validate_sponsor_data($sponsor)) {
            continue;
        }

        $level = strtolower($sponsor['level']);
        if (!isset($SPONS[$level])) {
            $SPONS[$level] = array();
        }

        // Create JSON object
        $SPON_obj = array(
            'name' => array(
                'zh-tw' => $sponsor['name']
            ),
            'desc' => array(
                'zh-tw' => Markdown_Without_Markup($sponsor['desc'])
            ),
            'url' => $sponsor['url'],
            'logoUrl' => MARKSITE_ABSOLUTE_PATH . SPONSOR_LOGO_RELATIVE_PATH . $sponsor['logoUrl']
        );


        if ($sponsor['enName']) {
            $SPON_obj['name']['en'] = $sponsor['enName'];
        }

        if ($sponsor['enDesc']) {
            $SPON_obj['desc']['en'] = Markdown_Without_Markup($sponsor['enDesc']);
        }

        if ($sponsor['zhCnName']) {
            $SPON_obj['name']['zh-cn'] = $sponsor['zhCnName'];
        }

        if ($sponsor['zhCnDesc']) {
            $SPON_obj['desc']['zh-cn'] = Markdown_Without_Markup(linkify($sponsor['zhCnDesc']));
        }

        array_push($SPONS[$level], $SPON_obj);
    }

    fclose($handle);

    return $SPONS;
}

function get_donate_list_from_gdoc($source_url)
{
    $handle = @fopen($source_url, 'r');

    if (!$handle) {
        return FALSE; // failed
    }

    $donate_list = array();

    // name, money
    while (($entry = fgetcsv($handle)) !== FALSE) {
        if ($entry[0] === 'anonymous') {
            $donate_list[0] = $entry[1];
            continue;
        }
        $money = intval($entry[1]);
        if (!isset($donate_list[$money])) {
            $donate_list[$money] = array();
        }
        $donate_list[$money][] = $entry[0];
    }

    fclose($handle);

    krsort($donate_list);
    if (extension_loaded("intl")) {
        $collator = new Collator('zh_TW_STROKE');
        foreach ($donate_list as $m => &$names) {
            if ($m === 0)
                continue;
            $collator->sort($names); // sorting by name
        }
    }

    return $donate_list;
}

function get_sponsor_info_localize($SPON, $type = 'name', $locale = 'zh-tw', $fallback = 'zh-tw')
{
    if (isset($SPON[$type][$locale])) {
        return $SPON[$type][$locale];
    }
    return $SPON[$type][$fallback];
}

function get_sponsors_markdown($SPONS, $DONATES, $lang = 'zh-tw')
{

    // order of levels (fixed)
    $levels = array(
        'diamond',
        'gold',
        'silver',
        'bronze',
        'cohost',
        'special',
        'media'
    );

    $text = '';

    if (count($SPONS) === 0)
        return $text;

    $text .= "---\nlayout: nosides.php\n---\n# 大會贊助商";

    foreach ($levels as &$level) {
        if (!isset($SPONS[$level]) || !$SPONS[$level])
            continue;
        // donor should before media partners
        if ($level === 'media' && count($DONATES) > 0) {
            $text .= sprintf('<h2 id="donor" data-l10n-id="personal"></h2>' . "\n");
            $text .= sprintf('<p data-l10n-id="donateDesc"></p>' . "\n");

            $text .= '<div class="sponsor donor">' . "\n";
            $text .= '<img />' . "\n"; // just a placeholder
            $text .= '  <div class="sponsor-info"><ul>' . "\n";
            foreach ($DONATES as $m => &$names) {
                if ($m === 0) {
                    continue;
                }
                foreach ($names as $name) {
                    $text .= sprintf('<li>%s</li>' . "\n", htmlspecialchars($name));
                }
            }
            $text .= "</ul>\n";
            if (isset($DONATES[0])) {
                $text .= sprintf('<script type="application/l10n-data+json">{"anonymousDonors": %s}</script>' . "\n", $DONATES[0]);
                $text .= sprintf('<div data-l10n-id="donateAnonymous"></div>');
            }
            $text .= "</div></div>\n";
        }

        $text .= sprintf('<h2 id="%s" data-l10n-id="%s"></h1>' . "\n", $level, $level);

        foreach ($SPONS[$level] as $i => &$SPON) {
            $text .= '<div class="sponsor">' . "\n";
            $text .= sprintf('<a href="%s" target="_blank"><img src="%s" alt="%s" /></a>' . "\n", htmlspecialchars($SPON['url']), htmlspecialchars($SPON['logoUrl']), get_sponsor_info_localize($SPON, 'name', $lang));

            if ($SPON['desc'][$lang] && trim($SPON['desc'][$lang]) !== '') {
              $text .= '  <div class="sponsor-info">' . "\n";
              $text .= sprintf('    <h3>%s</h3>' . "\n", get_sponsor_info_localize($SPON, 'name', $lang));
              if (trim(get_sponsor_info_localize($SPON, 'desc', $lang))) {
                  $text .= sprintf('    %s', get_sponsor_info_localize($SPON, 'desc', $lang));
              }
              $text .= "  </div>\n</div>\n";
            }
        }
    }

    $text .= "\n## 贊助 COSCUP\n";
    $text .= "\n如果您欲贊助 COSCUP，請與 <a href=\"mailto:sponsorship@coscup.org\">sponsorship@coscup.org</a> 聯絡。\n";

    return $text;
}

$SPONS   = get_sponsors_list_from_gdoc($sponsors_sheets['sponsor']);
$DONATES = get_donate_list_from_gdoc($sponsors_sheets['donate']);

if ($SPONS === FALSE) {
    print "Notice: skip Sponsor list from Google Docs.\n";
} else {
    foreach ($sponsors_output as $lang => $path) {
        print "Write sponsors into " . $path . " .\n";
        $fp = fopen($path, "w");
        fwrite($fp, get_sponsors_markdown($SPONS, $DONATES, $lang));
        fclose($fp);
    }

    $donors    = array();
    $anonymous = 0;
    foreach ($DONATES as $m => &$names) {
        if ($m === 0) {
            $anonymous = $names;
            continue;
        }
        foreach ($names as $name) {
            $donors[] = $name;
        }
    }

    print "Write sponsors into " . $json_output["sponsors"] . " .\n";
    $fp = fopen($json_output["sponsors"], "w");
    fwrite($fp, json_encode(array(
        'sponsors' => $SPONS,
        'donors' => $donors,
        'anonymous' => $anonymous
    )));
    fclose($fp);
}

