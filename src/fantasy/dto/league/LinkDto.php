<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\API\DTO\MapsDto;

class LinkDto extends MapsDto
{

    public $name;

    public $src;

    static function dtomap($data)
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