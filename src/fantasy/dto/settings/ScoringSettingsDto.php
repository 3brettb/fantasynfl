<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class ScoringSettingsDto extends ObjectMapsDto
{

    static function mapObject($data)
    {
        $obj = new ScoringSettingsDto();
        foreach($data as $key => $value)
        {
            $obj->{$key} = self::mapArray($value, StatDto::class);
        }
        return $obj;
    }

    public function getPosition($position)
    {
        if($this->{$position} != null)
        {
            return $this->{$position};
        }
        else
        {
            return [];
        }
    }

}