<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

class DataReceiver implements AccessesPlayerData
{

    private $handler;

    private static $instance = null;

    private function __construct()
    {
        $type = config('fantasynfl.api.source');
        switch(strtoupper($type))
        {
            case "DATABASE":
                $this->handler = new DatabaseHandler();
                break;
            case "API":
            default:
                $this->handler = new ApiHandler();
                break;
        }
    }

    /**
     * @return DataReceiver
     */
    public static function instance()
    {
        if(static::$instance == null)
        {
            static::$instance = new DataReceiver();
        }
        return static::$instance;
    }

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesPlayerData Implementation -------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    public function getPlayers()
    {
        return $this->handler->getPlayers();
    }

}