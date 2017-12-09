<?php

namespace Fantasy\NFL;

use Fantasy\NFL\API\NflData;
use Fantasy\NFL\StatsAPI\Objects\Draft\Player;

class FantasyNFLAdmin
{

    public static function Build()
    {
        FantasyNFL::setLeague(1);
        dd(session()->all());
    }

    public static function LoadPlayerDatabase()
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

        foreach($players as $player)
        {
            $model = new \Fantasy\NFL\StatsAPI\Models\Player();
            $model->id = $player->id;
            $model->esbid = $player->esbid;
            $model->gsisPlayerId = $player->gsisPlayerId;
            $model->firstName = $player->firstName;
            $model->lastName = $player->lastName;
            $model->teamAbbr = $player->teamAbbr;
            $model->position = $player->position;
            $model->save();
        }
    }

}