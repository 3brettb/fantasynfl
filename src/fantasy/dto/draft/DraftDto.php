<?php

namespace Fantasy\NFL\Fantasy\DTO\Draft;

use Fantasy\NFL\API\DTO\MapsDto;
use Fantasy\NFL\Fantasy\DTO\Season\SeasonDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class DraftDto extends MapsDto
{

    public $id;

    public $sec_per_pick;

    public $complete;

    public $type;

    public $order;

    public $selections;

    public $keepers;

    public $model;

    static function dtomap($data)
    {
        $json = $data->content;

        $obj = new DraftDto();
        $obj->id = $data->id;
        $obj->sec_per_pick = $data->sec_per_pick;
        $obj->complete = $data->complete;
        $obj->type = $data->type;
        $obj->order = $json->order;
        $obj->selections = self::mapArray($json->selections, DraftSelectionDto::class);
        $obj->keepers = self::mapArray($json->keepers, DraftKeeperDto::class);
        $obj->model = $data->model;
        return $obj;
    }

    /**
     * @return SeasonDto
     */
    public function season()
    {
        return DataReceiver::instance()->getSeason($this->model->season_id);
    }

    /**
     * @return array DraftPickDto
     */
    public function picks()
    {
        return self::mapArray($this->model->picks, DraftPickDto::class);
    }

}