<?php

namespace Fantasy\NFL\API\DTO\News;

use Fantasy\NFL\API\DTO\MapsDto;

class NewsDto extends MapsDto
{

    public $lastUpdated;

    public $news;

    static function dtomap($data)
    {
        $obj = new NewsDto();
        $obj->lastUpdated = $data->lastUpdated;
        $obj->news = parent::mapArray($data->news, NewsItemDto::class);
        return $obj;
    }

}