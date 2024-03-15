<?php

namespace MVC\models\classes;

class News
{
    public int $id;

    public string $title;

    public string $content;

    public string $author;

    public function __construct(string $title, string $content, string $author)
    {        
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }

}
