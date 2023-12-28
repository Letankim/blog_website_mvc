<?php
class Advertise {
    protected $id;
    protected $name_program;
    protected $link;
    protected $img;
    protected $status;
    protected $date;

    public function __construct($id, $name_program, $link, $img, $status, $date)
    {
        $this->id = $id;
        $this->name_program = $name_program;
        $this->link = $link;
        $this->img = $img;
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
     * Get the value of name_program
     */ 
    public function getName_program()
    {
        return $this->name_program;
    }

    /**
     * Set the value of name_program
     *
     * @return  self
     */ 
    public function setName_program($name_program)
    {
        $this->name_program = $name_program;

        return $this;
    }

    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link)
    {
        $this->link = $link;

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