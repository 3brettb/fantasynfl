<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\Resources\Maps\ModelMapsDto;

class UserDto extends ModelMapsDto
{

    public $id;

    public $model;

    static function mapModel($data)
    {
        $obj = new UserDto();
        $obj->id = $data->id;
        $obj->model = $data->model;
        return $obj;
    }

}