<?php
class Slogan {
    protected $id;
    protected $topslogan;
    protected $bottomslogan;
    protected $status;
    protected $date;

    public function __construct($id, $topslogan, $bottomslogan, $status, $date)
    {
        $this->id = $id;
        $this->topslogan = $topslogan;
        $this->bottomslogan = $bottomslogan;
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
     * Get the value of topslogan
     */ 
    public function getTopslogan()
    {
        return $this->topslogan;
    }

    /**
     * Set the value of topslogan
     *
     * @return  self
     */ 
    public function setTopslogan($topslogan)
    {
        $this->topslogan = $topslogan;

        return $this;
    }

    /**
     * Get the value of bottomslogan
     */ 
    public function getBottomslogan()
    {
        return $this->bottomslogan;
    }

    /**
     * Set the value of bottomslogan
     *
     * @return  self
     */ 
    public function setBottomslogan($bottomslogan)
    {
        $this->bottomslogan = $bottomslogan;

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