<?php

namespace Fantasy\NFL\API\DTO\ScoringLeaders;

use Fantasy\NFL\Resources\ObjectMapsDto;
use Fantasy\NFL\Enums\PositionStrings;

class PlayerDto extends ObjectMapsDto
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

    static function mapObject($data)
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
                return OffensiveStatsDto::map($data);
            case PositionStrings::K:
                return KickingStatsDto::map($data);
            case PositionStrings::DEF:
                return DefenseStatsDto::map($data);
            case PositionStrings::DB:
            case PositionStrings::LB:
            case PositionStrings::DL:
                return DefensiveStatsDto::map($data);
        }
    }
}