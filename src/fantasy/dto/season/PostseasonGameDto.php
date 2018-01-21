<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\MapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class PostseasonGameDto extends MapsDto
{

    public $id;

    public $week;

    public $next_winner;

    public $next_loser;

    public $teams;

    public $result;

    static function dtomap($data)
    {
        try {
            return self::jsonmap($data);
        } catch(\ErrorException $e) {
            return null;
        }
    }

    static function jsonmap($data)
    {
        $obj = new PostseasonGameDto();
        $obj->id = $data->id;
        $obj->week = $data->week;
        $obj->next_winner = $data->next_winner;
        $obj->next_loser = $data->next_loser;
        $obj->teams = $data->teams;
        $obj->result = PostseasonGameResultDto::dtomap($data->result);
        return $obj;
    }

    public function nextWinnerGame()
    {
        return DataReceiver::instance()->getGame($this->next_winner);
    }

    public function nextLoserGame()
    {
        return DataReceiver::instance()->getGame($this->next_loser);
    }

}