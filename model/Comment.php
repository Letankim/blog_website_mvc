<?php
class Comment {
    protected $id;
    protected $idUser;
    protected $idPost;
    protected $comment;
    protected $time_comment;
    protected $status;

    public function __construct($id=null, $idUser=null, $idPost=null, $comment=null, $time_comment=null, $status=null)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idPost = $idPost;
        $this->comment = $comment;
        $this->time_comment = $time_comment;
        $this->status = $status;
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of idPost
     */ 
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * Set the value of idPost
     *
     * @return  self
     */ 
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of time_comment
     */ 
    public function getTime_comment()
    {
        return $this->time_comment;
    }

    /**
     * Set the value of time_comment
     *
     * @return  self
     */ 
    public function setTime_comment($time_comment)
    {
        $this->time_comment = $time_comment;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
?>