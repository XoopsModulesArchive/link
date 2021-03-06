<?php
// XP Syndication Module.
// Written by LLaumgui (http://www.xperience-fr.net)
//
// Some code used adapted from backend.php (http://br.xoopscube.org/)
// and Lykos Syndication (http://www.lykoszine.co.uk)
$filename = 'cache/mydownloads.rss'; //File to read/write
$timespan = 30; //3 hours (if the file is more recent than this, it will not be updated)
include '../../mainfile.php';
$fd = fopen($filename, 'rb');
if ($fd and (time() - filemtime($filename) < $timespan)) {
    $contents = fread($fd, filesize($filename));
    echo $contents;
    fclose($fd);
} else {
    fclose($fd);
    $sql    = 'SELECT lid, title FROM ' . $xoopsDB->prefix('mydownloads_downloads') . ' WHERE status<>0 ORDER BY date DESC';
    $result = $xoopsDB->query($sql, 10, 0);
    if (!$result) {
        echo 'An error occured';
    } else {
        header('Content-Type: text/plain');
        $fd   = fopen($filename, 'w+b');
        $temp = '<?xml version="1.0" encoding="' . _CHARSET . "\"?>\n";
        $temp .= "<rss version=\"0.92\">\n";
        $temp .= " <channel>\n";
        $temp .= ' <title>' . $xoopsConfig['sitename'] . " - Downloads </title>\n";
        $temp .= ' <link>' . XOOPS_URL . "/mydownloads</link>\n";
        $temp .= ' <description>' . $xoopsConfig['slogan'] . "</description>\n";
        $temp .= " <image>\n";
        $temp .= ' <title>' . $xoopsConfig['sitename'] . "</title>\n";
        $temp .= ' <url>' . XOOPS_URL . "/images/logo.gif</url>\n";
        $temp .= ' <link>' . XOOPS_URL . "/</link>\n";
        $temp .= ' <description>' . $xoopsConfig['slogan'] . "</description>\n";
        $temp .= " <width>88</width>\n";
        $temp .= " <height>31</height>\n";
        $temp .= " </image>\n";
        $myts = MyTextSanitizer::getInstance();
        while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
            $myrow = str_replace('?, ' & eacute;
            ", $myrow);
$myrow = str_replace(" ? , '&egrave;', $myrow);
$myrow = str_replace('&', '&amp;', $myrow);
$myrow = str_replace('?, ' & ccedil;", $myrow);
$temp .= " < item > \n";
$temp .= " < title > ".htmlspecialchars($myrow['title'])." < / title > \n";
$temp .= " < link > '.XOOPS_URL.' / modules / mydownloads / index . php ? lid = ".htmlspecialchars($myrow['did'])." < / link > \n";
$temp .= " < / item > \n";
}
$temp .= " < / channel > \n";
$temp .= " < / rss > "; 
}
echo $temp;
fwrite ($fd, $temp, strlen($temp));
fclose ($fd);
} 
?>
