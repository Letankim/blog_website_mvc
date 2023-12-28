<?php
class Product {
    protected $id;
    protected $img;
    protected $link_demo;
    protected $link_code;
    protected $status;
    protected $date;

    public function __construct($id, $img, $link_demo, $link_code, $status, $date)
    {
        $this->id = $id;
        $this->img = $img;
        $this->link_demo = $link_demo;
        $this->link_code = $link_code;
        $this->status = $status;
        $this->date = $date;
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
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of link_demo
     */ 
    public function getLink_demo()
    {
        return $this->link_demo;
    }

    /**
     * Set the value of link_demo
     *
     * @return  self
     */ 
    public function setLink_demo($link_demo)
    {
        $this->link_demo = $link_demo;

        return $this;
    }

    /**
     * Get the value of link_code
     */ 
    public function getLink_code()
    {
        return $this->link_code;
    }

    /**
     * Set the value of link_code
     *
     * @return  self
     */ 
    public function setLink_code($link_code)
    {
        $this->link_code = $link_code;

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

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
?>