<?php

namespace Fantasy\NFL\Fantasy\DTO\Rankings;

use Fantasy\NFL\Resources\Maps\ModelMapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class RankingsDto extends ModelMapsDto
{

    public $lastUpdated;

    public $title;

    public $type;

    public $rankings;

    public $model;

    static function mapModel($data)
    {
        $json = json_decode($data->data);

        $obj = new RankingsDto();
        $obj->lastUpdated = $json->lastUpdated;
        $obj->title = $json->title;
        $obj->type = $data->type;
        $obj->rankings = self::mapArray($json->rankings, RankingDto::class);
        $obj->model = $data;
        return $obj;
    }

    public function author()
    {
        return DataReceiver::instance()->getUser($this->model->user_id);
    }

    public function week()
    {
        return DataReceiver::instance()->getWeek($this->model->week_id);
    }

}