<?php
require "../resources/VideoDAO.php";
$videoDAO = new VideoDAO();
$video = array("video_id"=>$_POST["videoId"],
                "title"=>$_POST["title"],
                "views"=>$_POST["views"],
                "likes"=>$_POST["likes"],
                "dislikes"=>$_POST["dislikes"],
                "channel"=>$_POST["channel"]);
try {
    $videoDAO->addOrUpdate($video);
} catch (VideoAlreadyAddedException $e) {
    header("Location: index.php?exist=1");
    return;
}
header("Location: index.php");

