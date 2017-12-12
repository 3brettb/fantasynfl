<?php

namespace Fantasy\NFL;

use Fantasy\NFL\API\NflData;
use Fantasy\NFL\Enums\PositionStrings;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;
use Fantasy\NFL\StatsAPI\Objects\Draft\Player;
use Fantasy\NFL\StatsAPI\Models\Player as PlayerModel;

class FantasyNFLAdmin
{
    public static function Test()
    {
        //$stats = DataReceiver::instance()->getPlayerWeekStats(234, 2017);
        //$data = DataReceiver::instance()->getResearchInfo();
        //$data = DataReceiver::instance()->getAdvancedStats(null, null, PositionStrings::RB);
        //$data = DataReceiver::instance()->getGameStats(2017120700);
        $data = DataReceiver::instance()->getStatsConfig();
    }

    public static function Build()
    {
        FantasyNFL::setLeague(1);
        dd(session()->all());
    }

    public static function LoadPlayerDatabase()
    {
        $data = NflData::getAllPlayers();
        $players = collect();
        foreach($data as $group)
        {
            foreach($group->players as $json)
            {
                $player = Player::mapJson($json);
                $players->push($player);
            }
        }

        PlayerModel::truncate();
        $data_array = array();
        foreach($players as $player){
            $a = array(
                'id' => $player->id,
                'esbid' => $player->esbid,
                'gsisPlayerId' => $player->gsisPlayerId,
                'name' => $player->firstName.' '.$player->lastName,
                'firstName' => $player->firstName,
                'lastName' => $player->lastName,
                'teamAbbr' => $player->teamAbbr,
                'position' => $player->position
            );
            array_push($data_array, $a);
        }
        PlayerModel::insert($data_array);
    }

}