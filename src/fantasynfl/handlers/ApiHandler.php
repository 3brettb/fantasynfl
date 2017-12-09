<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

use Fantasy\NFL\API\NflData;
use Fantasy\NFL\StatsAPI\Objects\StatPlayer as Player;

class ApiHandler implements Handler, AccessesPlayerData
{
    public function __construct()
    {

    }

    public function getPlayers()
    {
        $data = NflData::AllPlayers();
        $players = collect();
        foreach($data as $group)
        {
            foreach($group->players as $json)
            {
                $player = Player::mapJson($json);
                $players->push($player);
            }
        }
        return $players;
    }
}