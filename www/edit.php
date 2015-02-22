<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="script/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="script/script.js"></script>
    <title>Add/Edit Video</title>
</head>
<body>
<div align="center">

    <div style="color: #861b0c; font-size: 30px">
        <?php
        require "../resources/VideoDAO.php";
        if(!empty($_POST)){
            $videoDAO = new VideoDAO();
            $id = $_POST["id"][0];
            $video = $videoDAO->getVideo($id);
            echo "Edit Video Details";
        }else  echo "Add Video Details";
        ?>
    </div>

    <form id="editForm"  method="post" >
        <input name="id" type="hidden" value=<?php echo $video["id"]?>>
        <table align="center">
            <tr>
                <td><label>Video ID</label></td>
                <td><input name="video_id" value=<?php echo $video["video_id"]?>></td>
            </tr>
            <tr>
                <td><label>Title</label></td>
                <td><input name="title" value="<?php echo $video["title"]?>"></td>
            </tr>
            <tr>
                <td><label>Views</label></td>
                <td><input name="views" value=<?php echo $video["views"]?>></td>
            </tr>
            <tr>
                <td><label>Likes</label></td>
                <td><input name="likes" value=<?php echo $video["likes"]?>></td>
            </tr>
            <tr>
                <td><label>Dislikes</label></td>
                <td><input name="dislikes" value=<?php echo $video["dislikes"]?>></td>
            </tr>
            <tr>
                <td><label>Channel</label></td>
                <td><input name="channel" value=<?php echo $video["channel"]?>></td>
            </tr>
            <tr >
                <td>
                    <?php
                    if(empty($video)){
                        echo "<input type='button' id='addButton' value='Add'/>";
                    }else echo "<input type='button' id='updateButton' value='Update'/>";
                    ?>
                </td>
                <td>
                    <input type="button" id="cancelButton" value="Cancel" />
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>