<?php

namespace Fantasy\NFL\API\Query;

use Fantasy\NFL\API\HttpClient;

class QueryGroup extends HandlesJsonData
{

    public $queries;

    protected $handlesAsGroup = true;

    public function __construct($queries = [])
    {
        $this->queries = $queries;
    }

    public function query($key, Query $query)
    {
        $this->queries[$key] = $query;
        return $this;
    }

    public function execute()
    {
        $group = [];
        foreach($this->queries as $key => $query)
        {
            $group[$key] = array($query->uri, $query->paramsToArray());
        }
        $this->responseData = HttpClient::getGroup($group);
        return $this;
    }

    public static function define()
    {
        return new QueryGroup();
    }

}