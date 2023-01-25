<?php 

function mapToUsernames($el) {
    return $el["username"];
}

require_once("bootstrap.php");

$postId = $_GET["id"];
$data = $dbh->getPostData($postId)[0];
$user = $dbh->getUserData($data["username"])[0];
$comments = $dbh->getComments($postId);
$trackId = $data["song"];
require("fetchTrackData.php");

$templateParams["title"] = "Spotlight - Post";
$templateParams["username"] = $data["username"];
$templateParams["profilePic"] = "upload/" . $user["profile_pic"];
$templateParams["albumCover"] = $track->album->images[0]->url;
$templateParams["trackName"] = $track->name;
$templateParams["date"] = $data["date"];


$commentsWithPic = [];
foreach ($comments as $comment) {
    $u = $dbh->getUserData($comment["username"])[0];
    $comment["profilePic"] = $u["profile_pic"];
    $replies = $dbh->getCommentReplies($comment["comment_id"]);

    $comment["replies"] = [];
    foreach ($replies as $rep) {
        $u = $dbh->getUserData($rep["username"])[0];
        $rep["profilePic"] = $u["profile_pic"];
        $comment["replies"][] = $rep;
    }
    $commentsWithPic[] = $comment;
}
$templateParams["comments"] = $commentsWithPic;

$likes = $dbh->getPostLikes($postId);
$likes = array_map("mapToUsernames", $likes);
$postIsLiked = (in_array('rob',array_values($likes)));

require("template/postPage.php");

?>
