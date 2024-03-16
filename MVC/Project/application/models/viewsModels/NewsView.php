<?php

namespace MVC\models\viewsModels;

class NewsView
{
    public int $countRows;

    public array $news;

    public int $actualPage;

    public function __construct(int $countRows, array $news, int $actualPage)
    {
        $this->countRows = $countRows;
        $this->news = $news;
        $this->actualPage = $actualPage;
    }
}