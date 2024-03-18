<?php

namespace MVC\models\mappers;

use MVC\models\classes\News;

/**
 * PHP version 8.3.3
 * Disctription: Mapper for entity News

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Route;
 * @package  MVC\models\mappers;
 */

class NewsMapper
{
    /**
     * mapNews convert db array -> News
     *
     * @param  mixed $data
     * @return News
     */
    public static function mapNews($data): News
    {
        return new News($data[0]['id'], $data[0]['title'], $data[0]['content'], $data[0]['author'], $data[0]['date']);
    }
}
