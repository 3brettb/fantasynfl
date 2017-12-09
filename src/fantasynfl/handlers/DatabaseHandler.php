<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

use Fantasy\NFL\StatsAPI\Models\Player;
use Fantasy\NFL\StatsAPI\Objects\StatPlayer;

class DatabaseHandler implements Handler, AccessesPlayerData
{

    public function __construct()
    {

    }

    public function getPlayers()
    {
        $data = Player::all();
        $players = collect();
        foreach($data as $model)
        {
            $player = StatPlayer::mapModel($model);
            $players->push($player);
        }
        return $players;
    }

}