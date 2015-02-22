<?php
require "../resources/VideoDAO.php";
$videoDAO = new VideoDAO();
$videoDAO->deleteVideos($_POST["id"]);
header("Location: index.php");