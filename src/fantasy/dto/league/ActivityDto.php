<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\Resources\MapsDto;

class ActivityDto extends MapsDto
{

    public $id;

    public $type;

    public $time;

    public $heading;

    public $content;

    public $involved;

    public $links;

    public $model;

    static function dtomap($data)
    {
        $json = json_decode($data->content);

        $obj = new ActivityDto();
        $obj->id = $data->id;
        $obj->type = $data->type;
        $obj->time = $json->time;
        $obj->heading = $json->heading;
        $obj->content = $json->content;
        $obj->involved = self::mapArray($json->involved, ActivityInvolvedDto::class);
        $obj->links = self::mapArray($json->links, LinkDto::class);
        $obj->model = $data;
        return $obj;
    }

}