<?php

namespace Fantasy\NFL\API\DTO\News;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class NewsDto extends ObjectMapsDto
{

    public $lastUpdated;

    public $news;

    static function mapObject($data)
    {
        $obj = new NewsDto();
        $obj->lastUpdated = $data->lastUpdated;
        $obj->news = parent::mapArray($data->news, NewsItemDto::class);
        return $obj;
    }

}