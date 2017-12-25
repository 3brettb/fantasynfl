<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\Resources\MapsDto;

class UserDto extends MapsDto
{

    public $id;

    public $model;

    static function dtomap($data)
    {
        $obj = new UserDto();
        $obj->id = $data->id;
        $obj->model = $data->model;
        return $obj;
    }

}