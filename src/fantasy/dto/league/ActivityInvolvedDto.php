<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class ActivityInvolvedDto extends ObjectMapsDto
{

    public $id;

    public $type;

    static function mapObject($data)
    {
        $obj = new ActivityInvolvedDto();
        $obj->id = $data->id;
        $obj->type = $data->type;
        //return $obj;
        return $obj->get();
    }

    public function get()
    {
        return $this->type::find($this->id);
    }

}