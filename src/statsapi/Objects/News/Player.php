<?php

namespace Fantasy\NFL\StatsAPI\Objects\News;

use Fantasy\NFL\StatsAPI\Objects\StatPlayer;
use Fantasy\NFL\Resources\MapObjects;

class Player extends StatPlayer
{

    public $id;

    public $timestamp;

    public $source;

    public $headline;

    public $body;

    public $analysis;

    static function map(StatPlayer & $player, $id = null, $timestamp = null, $source = null, $headline = null, $body = null, $analysis = null)
    {
        cast($player, Player::class);
        $player->id = $id;
        $player->timestamp = $timestamp;
        $player->source = $source;
        $player->headline = $headline;
        $player->body = $body;
        $player->analysis = $analysis;
        return $player;
    }

}