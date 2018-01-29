<?php

namespace Fantasy\NFL\FantasyNFL\Data;

abstract class Command
{

    /**
     * @return array
     */
    protected abstract function execute();

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exec()
    {
        return collect($this->execute());
    }

}