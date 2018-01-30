<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\FantasyNFL\Data\Activity\HasActivityData;
use Fantasy\NFL\FantasyNFL\Data\League\HasLeagueData;
use Fantasy\NFL\FantasyNFL\Common\CallableMethods;
use Fantasy\NFL\FantasyNFL\Data\Request;

class FantasyData extends CallableMethods
{

    // Data Plugin Resources
    use HasLeagueData,
        HasActivityData;


    // ------------ Alias methods --------------------------------------------------------------------------------------

    /**
     * @param $id
     * @return Data\League\Models\League
     */
    public function find($id)
    {
        return $this->get(new Request('getLeague', [
            'id' => $id
        ]));
    }

    // ------------ Singleton Contructor -------------------------------------------------------------------------------

    protected static $instance = null;

    private function __construct(){}

    /**
     * @return FantasyData
     */
    public static function instance()
    {
        if(static::$instance == null)
        {
            static::$instance = new FantasyData();
        }
        return static::$instance;
    }
}