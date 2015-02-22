<?php
include "simple_html_dom.php";
$url = "http://www.youtube.com/watch?v=".$_POST["videoId"];
 echo file_get_html($url);

//echo $document->find("#eow-title");