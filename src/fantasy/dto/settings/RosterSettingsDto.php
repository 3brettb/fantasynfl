<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\MapsDto;

class RosterSettingsDto extends MapsDto
{

    public $starters;

    public $bench;

    public $ir;

    public $positions;

    public $keepers;

    static function dtomap($data)
    {
        $obj = new RosterSettingsDto();
        $obj->starters = self::mapArray($data->starters, StarterSettingsDto::class);
        $obj->bench = $data->bench;
        $obj->ir = $data->ir;
        $obj->positions = self::mapArray($data->positions, RosterPositionDto::class);
        $obj->keepers = $data->keepers;
        return $obj;
    }

}