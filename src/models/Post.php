<?php

class Post
{
    private $title;
    private $description;
    private $image;
    private $content;
    private $like;
    private $dislike;
    private $id;

    public function __construct($title, $description, $image, $content, $like = 0, $dislike = 0, $id = null){
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->content = $content;
        $this->like = $like;
        $this->dislike = $dislike;
        $this->id = $id;
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

    public function getLike(): int
    {
        return $this->like;
    }

    public function setLike(int $like): void
    {
        $this->like = $like;
    }

    public function getDislike(): int
    {
        return $this->dislike;
    }

    public function setDislike(int $dislike): void
    {
        $this->dislike = $dislike;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
}