<?php
class Comment
{
    private $id;
    private $postId;
    private $author;
    private $comment;
    private $dateComment;   
    
    public function __construct($id, $postId, $author, $comment, $dateComment)
    {
        $this->id = $id;
        $this->postId = $postId;
        $this->author = $author;
        $this->comment = $comment;
        $this->dateComment = $dateComment;
    }

        /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

        /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

        /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

        /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

        /**
     * @return mixed
     */
    public function getDateComment()
    {
        return $this->dateComment;
    }

    /**
     * @param mixed $dateComment
     */
    public function setDateComment($dateComment)
    {
        $this->dateComment = $dateComment;
    }
}