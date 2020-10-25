<?php

// XP Syndication Module.
// Written by LLaumgui (http://www.xperience-fr.net)
//
// Some code used adapted from backend.php (http://br.xoopscube.org/)
// and Lykos Syndication (http://www.lykoszine.co.uk)
include 'header.php';
if ('link' == $xoopsConfig['startpage']) {
    $xoopsOption['show_rblock'] = 1;

    require XOOPS_ROOT_PATH . '/header.php';

    make_cblock();
} else {
    $xoopsOption['show_rblock'] = 0;

    require XOOPS_ROOT_PATH . '/header.php';
}
$myts = MyTextSanitizer::getInstance();
/* -------- config -------------- */

$banner_one = XOOPS_URL . '/images/s_ownedby.gif';
$banner_two = XOOPS_URL . '/images/ownedby.gif';
$banner_three = XOOPS_URL . '/images/logo.gif';
$banner_four = XOOPS_URL . '/images/banners/xoops_banner.gif';
$banner_five = XOOPS_URL . '/images/banners/xoops_banner_2.gif';

$news_rss = XOOPS_URL . '/modules/link/news_rss.php';
//$news_rss = XOOPS_URL.'/backend.php';
$news_js = XOOPS_URL . '/modules/link/news_js.php';
$mylinks_rss = XOOPS_URL . '/modules/link/mylinks_rss.php';
$mylinks_js = XOOPS_URL . '/modules/link/mylinks_js.php';
$xhnewbb_rss = XOOPS_URL . '/modules/link/xhnewbb_rss.php';
$xhnewbb_js = XOOPS_URL . '/modules/link/xhnewbb_js.php';
$ipboard_rss = XOOPS_URL . '/modules/link/ipboard_rss.php';
$ipboard_js = XOOPS_URL . '/modules/link/ipboard_js.php';
$mydownload_rss = XOOPS_URL . '/modules/link/mydownloads_rss.php';
$mydownload_js = XOOPS_URL . '/modules/link/mydownloads_js.php';
$weblog_rss = XOOPS_URL . '/modules/weblog/backend_weblog.php';

$rss_logo = XOOPS_URL . '/modules/link/images/rss.gif';
/* -------- /config -------------- */
OpenTable();
$sql = 'SELECT * FROM ' . $xoopsDB->prefix('modules') . " WHERE isactive='1' ORDER BY weight ASC";
$result = $xoopsDB->query($sql);
echo '<h3>' . _LINK_SYND . '</h3>';
echo '<h4>' . _LINK_TXT_ONE . '</h4>
<p></p>';
echo "<TABLE class='outer' cellspacing='1'><TR>
<td class='head'>" . _LINK_EXEMPLE . "</td>
<TD class='even'><b><a href='" . XOOPS_URL . "'>" . $xoopsConfig['sitename'] . "</b></a></td>
</tr><tr>
<td class='head'>" . _LINK_LINKURL . "</td>
<TD class='even'>" . XOOPS_URL . "/ </td>
</tr><TR>
<td class='even' colspan='2'>" . _LINK_COPYCODE . "<br>
<div align='center'><textarea name='lientxt' cols='70' rows='2' wrap='VIRTUAL'><a href='" . XOOPS_URL . "/'>" . $xoopsConfig['sitename'] . '</a></textarea></div></td>
</tr></table>';
echo '<br><hr>';
if ($banner_one) {
    echo '<h4>' . _LINK_BN_ONE . '</h4>
<p></p>';

    link_banner($banner_one);
}
if ($banner_two) {
    echo '<h4>' . _LINK_BN_TWO . '</h4>
<p></p>';

    link_banner($banner_two);
}
if ($banner_three) {
    echo '<h4>' . _LINK_BN_THREE . '</h4>
<p></p>';

    link_banner($banner_three);
}
if ($banner_four) {
    echo '<h4>' . _LINK_BN_FOUR . '</h4>
<p></p>';

    link_banner($banner_four);
}
if ($banner_five) {
    echo '<h4>' . _LINK_BN_FIVE . '</h4>
<p></p>';

    link_banner($banner_five);
}
echo '<a name="rss"></a>';
while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
    if ('ipboard' == $myrow['dirname']) {
        1 == $actmods['ipboard'];

        echo '<h4>' . _LINK_FORUM . " <img src='" . $rss_logo . "' border='0'></h4>
<p>" . _LINK_FORUM . _LINK_COMM . '<br>
' . _LINK_ESPL . '</p>';

        link_rss(_LINK_FORUM, $ipboard_rss, $ipboard_js);
    }

    if ('mylinks' == $myrow['dirname']) {
        1 == $actmods['mylinks'];

        echo '<h4>' . _LINK_LINKS . " <img src='" . $rss_logo . "' border='0'></h4>
<p>" . _LINK_LINKS . _LINK_COMM . '<br>
' . _LINK_ESPL . '</p>';

        link_rss(_LINK_LINKS, $mylinks_rss, $mylinks_js);
    }

    if ('mydownloads' == $myrow['dirname']) {
        1 == $actmods['mydownloads'];

        echo '<h4>' . _LINK_DOWNLOADS . " <img src='" . $rss_logo . "' border='0'></h4>
<p>" . _LINK_DOWNLOADS . _LINK_COMM . '<br>
' . _LINK_ESPL . '</p>';

        link_rss(_LINK_DOWNLOADS, $mydownload_rss, $mydownload_js);
    }

    if ('xhnewbb' == $myrow['dirname']) {
        1 == $actmods['xhnewbb'];

        echo '<h4>' . _LINK_NEWBB . " <img src='" . $rss_logo . "' border='0'></h4>
<p>" . _LINK_NEWBB . _LINK_COMM . '<br>
' . _LINK_ESPL . '</p>';

        link_rss(_LINK_NEWBB, $xhnewbb_rss, $xhnewbb_js);
    }

    if ('news' == $myrow['dirname']) {
        1 == $actmods['news'];

        echo '<h4>' . _LINK_NEWS . " <img src='" . $rss_logo . "' border='0'></h4>
<p>" . _LINK_NEWS . _LINK_COMM . '<br>
' . _LINK_ESPL . '</p>';

        link_rss(_LINK_NEWS, $news_rss, $news_js);
    }

    if ('weblog' == $myrow['dirname']) {
        1 == $actmods['weblog'];

        echo '<h4>' . _LINK_WEBLOG . " <img src='" . $rss_logo . "' border='0'></h4>
<p>" . _LINK_WEBLOG . _LINK_COMM . '</p>';

        link_rss(_LINK_WEBLOG, $weblog_rss);
    }
}
CloseTable();
require XOOPS_ROOT_PATH . '/footer.php';
function link_banner($banner)
{
    global $xoopsConfig;

    echo "<TABLE class='outer' cellspacing='1'><TR>
<td class='head'>" . _LINK_EXEMPLE . "</td>
<TD class='even'>
<a href='" . XOOPS_URL . "/'><img src='" . $banner . "' alt='" . $xoopsConfig['sitename'] . ' - ' . $xoopsConfig['slogan'] . "' border='0'></a></td>
</tr><tr>
<td class='head'>" . _LINK_BURL . "</td>
<TD class='even'><b>" . $banner . "</b><br></td>
</tr><TR>
<td class='even' colspan='2'>" . _LINK_COPYCODE . "<br>
<div align='center'><textarea name='lienbt' cols='70' rows='4' wrap='VIRTUAL'><a href='" . XOOPS_URL . "/'><img src='" . $banner . "' alt='" . $xoopsConfig['sitename'] . ' - ' . $xoopsConfig['slogan'] . "' border='0'></a></textarea></div></td>
</tr></table>";

    echo '<br><hr>';
}

function link_rss($title, $rss, $js = '')
{
    if ($js) {
        echo "<table width='100%' border='0' align='center' class='outer' cellspacing='1'>
<tr>
<td class='head' width='35%'>" . _LINK_EXEMPLE . "</td>
<td class='even' width='65%' rowspan='2'>" . _LINK_COPYCODE . "<br><br>
<div align='center'><b>JavaScript: </b><br>
<textarea name='' cols='45' rows='4'>&lt;script src=&quot;" . $js . "&quot;&gt;&lt;/script&gt;</textarea></div><br>
<div align='center'><b>RSS: </b><br>
<textarea name='' cols='45' rows='4'>" . $rss . "&nbsp;</textarea></div><br>
</td>
</tr><tr>
<TD class='even'>
<table border='1'>
<tr><td align='left'><script src='" . $js . "'></script></td></tr>
</table>
</td></tr></table>";

        echo '<BR><hr>';
    } else {
        echo "<table width='100%' border='0' align='center' class='outer' cellspacing='1'>
<tr>
<td class='even'>" . _LINK_COPYCODE . "<br>
<div align='center'><b>RSS: </b><br>
<textarea name='' cols='45' rows='4'>" . $rss . '&nbsp;</textarea></div><br>
</td></tr></table>';

        echo '<BR><hr>';
    }
}
