<?php

namespace MVC\models\viewsModels;

/**
 * PHP version 8.3.3
 * Disctription: ViewModel for response in News controller

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Route;
 * @package  MVC\models\mappers;
 */
class NewsView
{
    public int $countRows;

    public array $news;

    public int $actualPage;

    /**
     * __construct
     *
     * @param  mixed $countRows
     * @param  mixed $news
     * @param  mixed $actualPage
     * @return void
     */
    public function __construct(int $countRows, array $news, int $actualPage)
    {
        $this->countRows = $countRows;
        $this->news = $news;
        $this->actualPage = $actualPage;
    }
}
