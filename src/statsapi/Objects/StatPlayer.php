<?php

namespace Fantasy\NFL\StatsAPI\Objects;

use Fantasy\NFL\StatsAPI\Models\Player;

class StatPlayer
{
    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $firstName;

    public $lastName;

    public $teamAbbr;

    public $position;

    public static function mapJson($json, $first = 'firstName', $last = 'lastName', $teamAbbr = 'teamAbbr', $position = 'position')
    {
        $player = new StatPlayer();
        $player->id = $json->id;
        $player->esbid = $json->esbid;
        $player->gsisPlayerId = $json->gsisPlayerId;
        $player->firstName = $json->{$first};
        $player->lastName = $json->{$last};
        $player->teamAbbr = $json->{$teamAbbr};
        $player->position = $json->{$position};
        return $player;
    }

    public static function mapModel(Player $model)
    {
        $player = new StatPlayer();
        $player->id = $model->id;
        $player->esbid = $model->esbid;
        $player->gsisPlayerId = $model->gsisPlayerId;
        $player->firstName = $model->firstName;
        $player->lastName = $model->lastName;
        $player->teamAbbr = $model->teamAbbr;
        $player->position = $model->position;
        return $player;
    }

}