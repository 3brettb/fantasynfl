<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\FantasyNFL\Resolvers\DataResolver;
use Fantasy\NFL\Resources\MapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class LeagueDto extends MapsDto
{

    use DataResolver;

    public $id;

    public $name;

    public $model;

    static function dtomap($data)
    {
        try {
            $obj = new LeagueDto();
            $obj->id = $data->id;
            $obj->name = $data->name;
            $obj->model = $data;
            return $obj;
        } catch (\ErrorException $e){
            return null;
        }
    }

    public function players()
    {
        try{
            return DataReceiver::instance()->getPlayers();
        } catch (\ErrorException $e){
            return [];
        }
    }

    public function teams()
    {
        try{
            return DataReceiver::instance()->getLeagueTeams($this->id);
        } catch (\ErrorException $e){
            return [];
        }
    }

    public function team($id)
    {
        try{
            return DataReceiver::instance()->getTeam($id);
        } catch (\ErrorException $e){
            return null;
        }
    }

    public function activity($id=null)
    {
        try{
            return DataReceiver::instance()->getLeagueActivity($this->id, $id);
        } catch (\ErrorException $e){
            return null;
        }
    }

    public function divisions()
    {
        try{
            return DataReceiver::instance()->getDivisions($this->model->season->id);
        } catch (\ErrorException $e){
            return null;
        }
    }

    public function division($id)
    {
        try{
            return DataReceiver::instance()->getDivision($id);
        } catch (\ErrorException $e){
            return null;
        }
    }

    public function week($number=null, $year=null)
    {
        try{
            $id = static::resolveWeekNumber(static::resolveOptionalWeekNumber($number), $year)->id;
            return DataReceiver::instance()->getWeek($id);
        } catch (\ErrorException $e){
            return null;
        }
    }

    public function season($id=null)
    {
        try{
            return DataReceiver::instance()->getSeason($id);
        } catch (\ErrorException $e){
            return null;
        }
    }

}