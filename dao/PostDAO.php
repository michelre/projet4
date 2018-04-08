<?php
require_once('dao/BaseDAO.php');
require_once('model/Post.php');

class PostDAO extends BaseDAO
{
    public function getPosts(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM posts');
        $posts = [];
        while($post = $req->fetch()){
            array_push($posts, new Post($post['id'], $post['title'], $post['content'], $post['date_created']));
        }
        return $posts;
    }

    public function getPost($postId){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return new Post($post['id'], $post['title'], $post['content'], $post['date_created']);
    }
}

