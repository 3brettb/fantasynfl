<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class LinkDto extends ObjectMapsDto
{

    public $name;

    public $src;

    static function mapObject($data)
    {
        $obj = new LinkDto();
        $obj->name = $data->name;
        $obj->src = $data->src;
        return $obj;
    }

    public function a_tag()
    {
        return "<a href='".$this->src."'>".$this->name."</a>";
    }

}