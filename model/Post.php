<?php
class Post {
    protected $id;
    protected $title;
    protected $shortDesc;
    protected $img;
    protected $content;
    protected $status;
    protected $priority;
    protected $id_nav;
    protected $id_user;
    protected $time_post;
    protected $time_last_update;
    protected $update_by;
    protected $view;
    protected $schedule;

    public function __construct($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $update_by,$view, $schedule)
    {
        $this->id = $id;
        $this->title = $title;
        $this->shortDesc = $shortDesc;
        $this->img = $img;
        $this->content = $content;
        $this->status = $status;
        $this->priority = $priority;
        $this->id_nav = $id_nav;
        $this->id_user = $id_user;
        $this->time_post = $time_post;
        $this->time_last_update = $time_last_update;
        $this->update_by = $update_by;
        $this->view = $view;
        $this->schedule = $schedule;
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
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of shortDesc
     */ 
    public function getShortDesc()
    {
        return $this->shortDesc;
    }

    /**
     * Set the value of shortDesc
     *
     * @return  self
     */ 
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

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
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

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
     * Get the value of priority
     */ 
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set the value of priority
     *
     * @return  self
     */ 
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get the value of id_na
     */ 
    public function getId_nav()
    {
        return $this->id_nav;
    }

    /**
     * Set the value of id_na
     *
     * @return  self
     */ 
    public function setId_nav($id_nav)
    {
        $this->id_nav = $id_nav;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of time_post
     */ 
    public function getTime_post()
    {
        return $this->time_post;
    }

    /**
     * Set the value of time_post
     *
     * @return  self
     */ 
    public function setTime_post($time_post)
    {
        $this->time_post = $time_post;

        return $this;
    }

    /**
     * Get the value of time_last_update
     */ 
    public function getTime_last_update()
    {
        return $this->time_last_update;
    }

    /**
     * Set the value of time_last_update
     *
     * @return  self
     */ 
    public function setTime_last_update($time_last_update)
    {
        $this->time_last_update = $time_last_update;

        return $this;
    }

    /**
     * Get the value of view
     */ 
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @return  self
     */ 
    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get the value of update_by
     */ 
    public function getUpdate_by()
    {
        return $this->update_by;
    }

    /**
     * Set the value of update_by
     *
     * @return  self
     */ 
    public function setUpdate_by($update_by)
    {
        $this->update_by = $update_by;

        return $this;
    }

    /**
     * Get the value of schedule
     */ 
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Set the value of schedule
     *
     * @return  self
     */ 
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;

        return $this;
    }
}
?>