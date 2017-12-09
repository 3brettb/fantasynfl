<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\API\DTO\MapsDto;

class VideoDto implements MapsDto
{

    public $id;

    public $smallPhotoUrl;

    public $mediumPhotoUrl;

    public $playerIds;

    public $title;

    public $description;

    public $timestamp;

    public $playTimeOfDay;

    public $gameDescription;

    public $gameClock;

    public $gamePlayId;

    public static function dtomap($data)
    {
        $obj = new VideoDto();
        $obj->id = $data->id;
        $obj->smallPhotoUrl = $data->smallPhotoUrl;
        $obj->mediumPhotoUrl = $data->mediumPhotoUrl;
        $obj->playerIds = self::mapPlayerIds($data->playerIds);
        $obj->title = $data->title;
        $obj->description = $data->description;
        $obj->timestamp = $data->timestamp;
        $obj->playTimeOfDay = $data->playTimeOfDay;
        $obj->gameDescription = $data->gameDescription;
        $obj->gameClock = $data->gameClock;
        $obj->gamePlayId = $data->gamePlayId;
        return $obj;
    }

    private static function mapPlayerIds($data)
    {
        $out = array();
        foreach($data as $item)
        {
            array_push($out, $item);
        }
        return $out;
    }

}