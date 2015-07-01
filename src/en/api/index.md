# API Documentation

COSCUP 2015 website provide following **read-only** JSON-P APIs for your application to access. Since they are provided in JSON-P, they are useful in client-side web applications too &mdash; just add the `callback` parameter. You many also utilize Cross-Origin Resource Sharing if the browser targeted supports it. `Access-Control-Allow-Origin: *` is added to HTTP header to all URLs.

## Program (`program`)

https://github.com/COSCUP/coscup-schedule/blob/gh-pages/app/components/Schedule/Schedule.js

## Sponsors (`sponsors`)

* URL: `http://coscup.org/2015/api/sponsors/`. [Indented view](http://json-indent.appspot.com/indent?url=http://coscup.org/2015/api/sponsors/).

List of COSCUP 2015 sponsors. You **must** hard-code the order of sponsorship levels. The list of sponsors within each of the sponsorship level is ordered, when shown as whole, the order **must** be maintained; if only one of the sponsors could be shown, the one to be shown **must** picked randomly with following weighted factor:

> diamond:gold:silver:bronze:media = 10:5:2:1:0

The picking algorithm has been implemented in Javascript for COSCUP 2014 website mobile layout; the source code can be found [here](http://coscup.org/2014-theme/assets/script.js) in `mobileSponsorLogo()`.

Your application should update the list of sponsors at least once a day.
