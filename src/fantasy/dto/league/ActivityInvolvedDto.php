<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\API\DTO\MapsDto;

class ActivityInvolvedDto extends MapsDto
{

    public $id;

    public $type;

    static function dtomap($data)
    {
        $obj = new ActivityInvolvedDto();
        $obj->id = $data->id;
        $obj->type = $data->type;
        return $obj;
    }

    public function get()
    {
        return $this->type::find($this->id);
    }

}