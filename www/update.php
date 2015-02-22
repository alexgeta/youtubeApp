<?php
include "../resources/VideoDAO.php";

$videoDAO = new VideoDAO();
$video = array("id"=>$_POST["id"],
               "video_id"=>$_POST["video_id"],
                "title"=>$_POST["title"],
                "views"=>$_POST["views"],
                "likes"=>$_POST["likes"],
                "dislikes"=>$_POST["dislikes"],
                "channel"=>$_POST["channel"]);
$videoDAO->addOrUpdate($video);
header("Location: index.php");






