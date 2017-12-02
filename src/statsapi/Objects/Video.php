<?php

namespace Fantasy\NFL\StatsAPI\Objects;

class Video
{

    public $id;

    public $smallPhotoUrl;

    public $mediumPhotoUrl;

    public $playerIds = [];

    public $title;

    public $description;

    public $timestamp;

    public $playTimeOfDay;

    public $gameDescription;

    public $gameClock;

    public $gamePlayId;

    public function getGameId()
    {
        return $this->splitGamePlayId()[1];
    }

    public function getGamePlayId()
    {
        return $this->splitGamePlayId()[2];
    }

    private function splitGamePlayId()
    {
        return preg_match('(.*)-(.*)', $this->gamePlayId);
    }

}