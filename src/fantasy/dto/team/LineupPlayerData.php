<?php

namespace Fantasy\NFL\Fantasy\DTO\Team;

use Fantasy\NFL\API\DTO\PlayerDetails\PlayerDto;
use Fantasy\NFL\Fantasy\Models\LineupPlayer;
use Illuminate\Support\Collection;

class LineupPlayerData
{

    // Player Details Properties

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $name;

    public $position;

    public $status;

    public $injuryGameStatus;

    public $jerseyNumber;

    public $teamAbbr;

    public $notes;

    public $videos;

    public $weeks;

    // Lineup Player properties

    public $projected;

    public $score;

    public $type;

    public $place;

    /**
     * LineupPlayerData constructor.
     * @param PlayerDto $player
     * @param LineupPlayer $lineup_player
     */
    public function __construct(PlayerDto $player, LineupPlayer $lineup_player)
    {
        // Map Player Data
        $this->id = $player->id;
        $this->esbid = $player->esbid;
        $this->gsisPlayerId = $player->gsisPlayerId;
        $this->name = $player->name;
        $this->position = $player->position;
        $this->status = $player->status;
        $this->injuryGameStatus = $player->injuryGameStatus;
        $this->jerseyNumber = $player->jerseyNumber;
        $this->teamAbbr = $player->teamAbbr;
        $this->notes = $player->notes;
        $this->videos = $player->videos;
        $this->weeks = $player->weeks;

        // Map Lineup Player Data
        $this->projected = $lineup_player->projected;
        $this->score = $lineup_player->score;
        $this->type = $lineup_player->type;
        $this->place = $lineup_player->place;
    }

    /**
     * @param PlayerDto[] $players
     * @param LineupPlayer[] $lineup_players
     * @return LineupPlayerDto[]
     */
    public static function convertToLineupPlayerDtos($players, $lineup_players)
    {
        $dtos = collect();
        foreach($players as $player)
        {
            $lineup_player = $lineup_players->where('player_id', $player->id)->first();
            $dtos->push( new LineupPlayerData($player, $lineup_player) );
        }
        return $dtos;
    }

}