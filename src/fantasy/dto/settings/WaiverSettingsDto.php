<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class WaiverSettingsDto extends ObjectMapsDto
{

    public $type;

    public $limit;

    public $period;

    static function mapObject($data)
    {
        $obj = new WaiverSettingsDto();
        $obj->type = $data->type;
        $obj->limit = $data->limit;
        $obj->period = $data->period;
        return $obj;
    }

}