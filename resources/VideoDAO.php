<?php
require "database.php";

class VideoDAO {

    private $connection = null;

    function __construct(){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getVideoList(){
        $sql = "SELECT * FROM videos ORDER BY id";
        return $this->connection->query($sql);
    }

    public function getVideo($id){
        $sql = "SELECT * FROM videos WHERE id=$id";
        $result = $this->connection->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function addOrUpdate($video){
        if($video["id"]){
            $sql = "UPDATE videos SET video_id = ?, title = ?, views = ?, likes = ?, dislikes = ?, channel = ?
                    WHERE id = ?";
            $PDOStatement = $this->connection->prepare($sql);
            return $PDOStatement->execute(array($video["video_id"],$video["title"],$video["views"],
                $video["likes"],$video["dislikes"],$video["channel"],$video["id"]));
        }else {
            $this->checkForExist($video["video_id"]);
            $sql = "INSERT INTO videos (video_id,title,views,likes,dislikes,channel) values (?,?,?,?,?,?)";
            $PDOStatement = $this->connection->prepare($sql);
            return $PDOStatement->execute(array($video["video_id"],$video["title"],$video["views"],
                $video["likes"],$video["dislikes"],$video["channel"]));
        }
    }

    private function checkForExist($videoId){
        $sql = "SELECT * FROM videos WHERE video_id='$videoId'";
        if($this->connection->query($sql)->rowCount()){
            throw new VideoAlreadyAddedException();
        }
    }

    public function deleteVideos(array $ids){
        $ids = implode(", ",$ids);
        $sql = "DELETE FROM videos WHERE id IN ($ids)";
        $this->connection->query($sql);
    }

}

class VideoAlreadyAddedException extends Exception{
}