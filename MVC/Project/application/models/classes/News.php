<?php

namespace MVC\models\classes;

/**
 * PHP version 8.3.3
 * Disctription: Model for News table Db

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category News;
 * @package  MVC\models\classes;
 * Route
 */

class News
{
    public int $id;

    public string $title;

    public string $content;

    public string $author;

    public string $date;

    /**
     * __construct
     *
     * @param  mixed $id
     * @param  mixed $title
     * @param  mixed $content
     * @param  mixed $author
     * @param  mixed $date
     * @return void
     */
    public function __construct(int $id, string $title, string $content, string $author, string $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = $date;
    }
}
