<?php

class Post
{
    private $title;
    private $description;
    private $image;
    private $content;

    public function __construct($title, $description, $image, $content){
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->content = $content;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
}