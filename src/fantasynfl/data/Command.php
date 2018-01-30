<?php

namespace Fantasy\NFL\FantasyNFL\Data;

abstract class Command
{

    protected $class = Model::class;

    /**
     * @return array
     */
    protected abstract function execute();

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exec()
    {
        return collect($this->execute())->map(function($item){
            return new $this->class->map($item);
        });
    }

}