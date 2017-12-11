<?php

namespace Fantasy\NFL\API\DTO\GameStats;

use Fantasy\NFL\API\DTO\MapsDto;

class GameStatsDto extends MapsDto
{

    public $playerStats;

    public $gameData;

    public $isWeekGamesCompleted;

    static function dtomap($data)
    {
        $obj = new GameStatsDto();
        $obj->playerStats = self::mapPlayers($data->playerStats);
        $obj->gameData = self::mapGameData($data->gameData);
        $obj->isWeekGamesCompleted = $data->isWeekGamesCompleted;
        return $obj;
    }

    private static function mapPlayers($data)
    {
        $out = array();
        foreach($data as $playerId => $playerStats)
        {
            $playerStats->id = $playerId;
            $out[$playerId] = PlayerDto::dtomap($playerStats);
        }
        return $out;
    }

    private static function mapGameData($data)
    {
        $out = array();
        foreach($data as $gameId => $gameData)
        {
            $gameData->id = $gameId;
            $out[$gameId] = GameDataDto::dtomap($gameData);
        }
        return $out;
    }

}