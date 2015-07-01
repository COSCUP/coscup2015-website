# API 文件

COSCUP 2015 網站提供下列**唯讀** JSON-P API 供第三方程式取用。因為具有 JSON-P 的能力，您可以用在 client 端網路應用程式；在引用時加上 `callback` 參數即可。若目標瀏覽器支援跨來源資源共享 (Cross-Origin Resource Sharing)，您也可以不使用 `callback` 參數；各 URL 皆會輸出 `Access-Control-Allow-Origin: *` HTTP 標頭。

## 議程 (`program`)

[議程在 GitHub 上歡迎想辦法 hack 一下...](https://github.com/COSCUP/coscup-schedule/blob/gh-pages/app/components/Schedule/Schedule.js)

## 贊助單位 (`sponsors`)

* URL: `http://coscup.org/2015/api/sponsors/`。[縮排顯示](http://json-indent.appspot.com/indent?url=http://coscup.org/2015/api/sponsors/)。

COSCUP 2015 的贊助商資訊。程式**應**內建各贊助等級的順序，各等級內的贊助單位順序在列出時**應**保存；在只能顯示一個贊助單位的場合，要顯示哪個贊助單位的機制必須使用加權隨機的方式挑選，加權比率如下：

> diamond:gold:silver:bronze:media = 10:5:2:1:0

此演算法的 Javascript 版本在 COSCUP 2014 手機版網頁有實作，您可以參考[此處](http://coscup.org/2014-theme/assets/script.js)位於 `mobileSponsorLogo()` 的程式碼。

程式至少需每日更新贊助單位資訊。
