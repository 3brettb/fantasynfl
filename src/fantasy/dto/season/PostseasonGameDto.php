<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class PostseasonGameDto extends ObjectMapsDto
{

    public $id;

    public $week;

    public $next_winner;

    public $next_loser;

    public $teams;

    public $result;

    static function mapObject($data)
    {
        $obj = new PostseasonGameDto();
        $obj->id = $data->id;
        $obj->week = $data->week;
        $obj->next_winner = $data->next_winner;
        $obj->next_loser = $data->next_loser;
        $obj->teams = $data->teams;
        $obj->result = PostseasonGameResultDto::map($data->result);
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