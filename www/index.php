<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>YouTubeMonitoring | Video List</title>
</head>
<body >
<div align="center">
    <div style="color: teal; font-size: 30px">YouTubeMonitoring | Video List</div>
    <br>
    <form method="post" id="tableForm">
    <?php
    include "VideoDAO.php";
    $videoDao = new VideoDAO();
    $videoList = $videoDao->getVideoList();
    if($videoList->rowCount()){
        echo "<table border='1' bgcolor='black' width='1200px'>
            <tr style='background-color: #dba2da; color: #6e037b; text-align: center;'
                height='40px'>
                <td>Link</td>
                <td>Title</td>
                <td>Views</td>
                <td>Likes</td>
                <td>Dislikes</td>
                <td>Channel</td>
                <td>Delete</td>
            </tr>";

        foreach ($videoList as $video) {
            echo "<tr style='background-color: white; color: rgba(0, 0, 0, 0.97); text-align: center;' height='30px'>";
            echo "<td><a target='_blank' href='http://www.youtube.com/watch?v=". $video["video_id"] ."'>
                        http://www.youtube.com/watch?v=". $video["video_id"] ."</a>
                  </td>";
            echo "<td>". $video["title"] . "</td>";
            echo "<td>". $video["views"] . "</td>";
            echo "<td>". $video["likes"] . "</td>";
            echo "<td>". $video["dislikes"] . "</td>";
            echo "<td>". $video["channel"] . "</td>";
            echo "<td><input type='checkbox' name='id[]' value=". $video["id"] ." class='checkbox'></td>";
            echo "</tr>";
        }
        echo "</table>";
    }else echo "<div class='emptyList'>You don't have any videos.</div>";
    ?>
        </form>
    <p></p>
    <div align="center">
        <input type="button" id="refreshButton" value="Refresh">
        <input type="button" id="editButton" value="Edit">
        <input type="button" id="deleteButton" value="Delete">
    </div>

    <p>
    <p>
    <form id="addVideoForm" method="post">
        <div class="addvideo">
            <table>
                <p>
                    <tr>Add new video:</tr>
                <p>
                    <tr><c:if test="${not empty error}">
                            <div class="error">${error}</div>
                        </c:if>
                        <c:if test="${not empty exist}">
                            <div class="exist">${exist}</div>
                        </c:if>
                    </tr>
                    <tr>
                        <td>http://www.youtube.com/watch?v=</td>
                        <td>
                            <input type="text" name="videoId"/>
                            <input type="button" id="addVideoButton" value="Add">
                        </td>
                    </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>