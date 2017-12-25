<?php

namespace Fantasy\NFL\API\DTO\ScoringLeaders;

use Fantasy\NFL\Resources\MapsDto;
use Fantasy\NFL\Enums\PositionStrings;

class PlayerDto extends MapsDto
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $firstName;

    public $lastName;

    public $teamAbbr;

    public $opponentTeamAbbr;

    public $position;

    public $rank;

    public $statsLine;

    public $stats;

    public $pts;

    public $projectedPts;

    public $status;

    static function dtomap($data)
    {
        $obj = new PlayerDto();
        $obj->id = $data->id;
        $obj->esbid = $data->esbid;
        $obj->gsisPlayerId = $data->gsisPlayerId;
        $obj->firstName = $data->firstName;
        $obj->lastName = $data->lastName;
        $obj->teamAbbr = $data->teamAbbr;
        $obj->opponentTeamAbbr = $data->opponentTeamAbbr;
        $obj->position = $data->position;
        $obj->rank = $data->rank;
        $obj->statsLine = $data->statsLine;
        $obj->stats = self::mapStats($data->stats, $data->position);
        $obj->pts = $data->pts;
        $obj->projectedPts = $data->projectedPts;
        $obj->status = $data->status;
        return $obj;
    }

    private static function mapStats($data, $position)
    {
        switch($position)
        {
            case PositionStrings::QB:
            case PositionStrings::RB:
            case PositionStrings::WR:
            case PositionStrings::TE:
                return OffensiveStatsDto::dtomap($data);
            case PositionStrings::K:
                return KickingStatsDto::dtomap($data);
            case PositionStrings::DEF:
                return DefenseStatsDto::dtomap($data);
            case PositionStrings::DB:
            case PositionStrings::LB:
            case PositionStrings::DL:
                return DefensiveStatsDto::dtomap($data);
        }
    }
}