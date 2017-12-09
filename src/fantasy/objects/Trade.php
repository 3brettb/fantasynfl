<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Enums\TradeStatus;
use Fantasy\NFL\Enums\TradeStatusStrings;
use Fantasy\NFL\Resources\Data\Object;
use Illuminate\Database\Eloquent\Model;

class Trade extends Object
{

    public $league;

    public $initiator;

    public $status;

    public $name;

    public $teams;

    public $items;

    static function mapModel(Model $model)
    {
        $trade = new Trade();
        $trade->league = $model->league;
        $trade->initiator = $model->user;
        $trade->status = static::convertStatus($model->status);
        $trade->name = static::createTradeName($model);
        $trade->teams = Teams::mapModels($model->teams);
        $trade->items = TradeItems::mapModels($model->items);
        return $trade;
    }

    static function createTradeName($model)
    {
        $names = [];
        foreach($model->teams as $team)
        {
            array_push($names, $team->fullname);
        }
        return implode(" - ", $names);
    }

    static function convertStatus($status_int)
    {
        switch ($status_int)
        {
            case TradeStatus::PROPOSED:
                return TradeStatusStrings::PROPOSED;
            case TradeStatus::REJECTED:
                return TradeStatusStrings::REJECTED;
            case TradeStatus::ACCEPTED:
                return TradeStatusStrings::ACCEPTED;
            case TradeStatus::APPROVED:
                return TradeStatusStrings::APPROVED;
            case TradeStatus::VETOED:
                return TradeStatusStrings::VETOED;
            case TradeStatus::PROCESSED:
                return TradeStatusStrings::PROCESSED;
            default:
                return TradeStatusStrings::UNDEFINED;
        }
    }

}