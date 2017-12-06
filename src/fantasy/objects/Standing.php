<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Enums\StandingsStrings;
use Fantasy\NFL\Enums\StandingsType;
use Fantasy\NFL\Resources\Object;
use Illuminate\Database\Eloquent\Model;
use Fantasy\NFL\Fantasy\Models\Team as TeamModel;

class Standing extends Object
{

    public $type;

    public $name;

    public $season;

    public $team;

    public $wins;

    public $losses;

    public $ties;

    public $official_rank;

    public $composite_rank;

    public $standing;

    static function mapModel(Model $model)
    {
        // Not Implemented
    }

    static function getTeamStanding(TeamModel $team, $type_int = null)
    {
        $standing = new Standing();
        switch ($type_int)
        {
            case StandingsType::DIVISION:
                return static::getDivision($standing, $team);
            case StandingsType::LEAGUE:
            default:
                return static::getLeague($standing, $team);
        }
    }

    static function getDivision(Standing $standing, TeamModel $team)
    {
        $record = static::getDivisionRecord($team);
        $rank = static::getRank($team);

        $standing->type = StandingsType::DIVISION;
        $standing->name = static::getDivisionName($team);
        $standing->team = $team;
        $standing->wins = $record->wins;
        $standing->losses = $record->losses;
        $standing->ties = $record->ties;
        $standing->official_rank = $rank->official;
        $standing->composite_rank = $rank->composite;
        $standing->standing = static::getDivisionStanding($team);
        return $standing;
    }

    static function getLeague(Standing $standing, TeamModel $team)
    {
        $record = static::getLeagueRecord($team);
        $rank = static::getRank($team);

        $standing->type = StandingsType::DIVISION;
        $standing->name = static::getLeagueName($team);
        $standing->team = $team;
        $standing->wins = $record->wins;
        $standing->losses = $record->losses;
        $standing->ties = $record->ties;
        $standing->official_rank = $rank->official;
        $standing->composite_rank = $rank->composite;
        $standing->standing = static::getLeagueStanding($team);
        return $standing;
    }

    static function getDivisionName(TeamModel $team)
    {
        return $team->division->name." ".StandingsStrings::DIVISION;
    }

    static function getLeagueName(TeamModel $team)
    {
        return $team->league->name." ".StandingsStrings::LEAGUE." Standings";
    }

    static function getDivisionRecord(TeamModel $team)
    {
        // TODO:: Complete method
    }

    static function getLeagueRecord(TeamModel $team)
    {
        // TODO:: Complete method
    }

    static function getRank(TeamModel $team)
    {
        // TODO:: Complete method
    }

    static function getDivisionStanding(TeamModel $team)
    {
        // TODO:: Complete method
    }

    static function getLeagueStanding(TeamModel $team)
    {
        // TODO:: Complete method
    }

}