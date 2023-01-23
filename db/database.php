<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connesione fallita al db");
        }
    }

    /* 
    public function getRandomPosts($n=2){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("i", $n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    */

    public function getArtistLikes($artistId){
        $stmt = $this->db->prepare("SELECT username FROM `likes` WHERE element_link=?");
        $stmt->bind_param("s", $artistId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostData($postId) {
        $stmt = $this->db->prepare("SELECT * FROM `post` WHERE post_id=?");
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserData($userId) {
        $stmt = $this->db->prepare("SELECT * FROM `user` WHERE username=?");
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getComments($postId) {
        $stmt = $this->db->prepare("SELECT * FROM `comment` WHERE post_id=?");
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCommentReplies($commentId) {
        $stmt = $this->db->prepare("SELECT * FROM `replies` WHERE thread=?");
        $stmt->bind_param("i", $commentId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostLikes($postId) {
        $stmt = $this->db->prepare("SELECT username FROM `likes_post` WHERE post_id=?");
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFriendsCount($username) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM friends WHERE F_U_username=? OR username=?");
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFollowerCount($username) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM follows WHERE F_U_username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFollowingCount($username) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM follows WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function followUser($sender, $receiver){
        $stmt = $this->db->prepare("INSERT INTO follows (F_U_username, username) VALUES (? ?) ");
        $stmt->bind_param("ss", $receiver, $sender);
        $stmt->execute();
    }

    public function unfollowUser($sender, $receiver){
        $stmt = $this->db->prepare("DELETE FROM follows WHERE F_U_username=? AND username=? ");
        $stmt->bind_param("ss", $receiver, $sender);
        $stmt->execute();
    }

    //friend request?
    public function eliminateFriend($sender, $receiver){
        $stmt = $this->db->prepare("DELETE FROM friends WHERE (F_U_username=? AND username=?) AND (F_U_username=? AND username=?)");
        $stmt->bind_param("ssss", $receiver, $sender, $sender, $receiver);
        $stmt->execute();
    }

    

}

?>