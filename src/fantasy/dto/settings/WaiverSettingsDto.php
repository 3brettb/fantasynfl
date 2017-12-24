<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\API\DTO\MapsDto;

class WaiverSettingsDto extends MapsDto
{

    public $type;

    public $limit;

    public $period;

    static function dtomap($data)
    {
        $obj = new WaiverSettingsDto();
        $obj->type = $data->type;
        $obj->limit = $data->limit;
        $obj->period = $data->period;
        return $obj;
    }

}