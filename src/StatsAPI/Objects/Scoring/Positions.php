<?php

namespace Fantasy\NFL\StatsAPI\Objects\Scoring;

use Fantasy\NFL\Enums\PositionStrings;
use Illuminate\Support\Collection;

class Positions
{

    public $QB;

    public $RB;

    public $WR;

    public $TE;

    public $K;

    public $DEF;

    public $DL;

    public $LB;

    public $DB;

    public $FLEX;

    public $RBWR;

    public $WRTE;

    public $ALL;

    public function __construct()
    {
        $this->QB = new Collection();
        $this->RB = new Collection();
        $this->WR = new Collection();
        $this->TE = new Collection();
        $this->K = new Collection();
        $this->DEF = new Collection();
        $this->DL = new Collection();
        $this->LB = new Collection();
        $this->DB = new Collection();
        $this->FLEX = new Collection();
        $this->RBWR = new Collection();
        $this->WRTE = new Collection();
        $this->ALL = new Collection();
    }

    public function add(Player $player)
    {
        $this->ALL->push($player);
        switch($player->position)
        {
            case PositionStrings::QB:
                $this->QB->push($player);
                break;
            case PositionStrings::RB:
                $this->RB->push($player);
                $this->FLEX->push($player);
                $this->RBWR->push($player);
                break;
            case PositionStrings::WR:
                $this->WR->push($player);
                $this->FLEX->push($player);
                $this->WRTE->push($player);
                $this->RBWR->push($player);
                break;
            case PositionStrings::TE:
                $this->TE->push($player);
                $this->FLEX->push($player);
                $this->WRTE->push($player);
                break;
            case PositionStrings::K:
                $this->K->push($player);
                break;
            case PositionStrings::DEF:
                $this->DEF->push($player);
                break;
            case PositionStrings::DL:
                $this->DL->push($player);
                break;
            case PositionStrings::LB:
                $this->LB->push($player);
                break;
            case PositionStrings::DB:
                $this->DB->push($player);
                break;
        }
    }

}