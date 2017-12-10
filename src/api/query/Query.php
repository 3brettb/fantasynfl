<?php

namespace Fantasy\NFL\API\Query;

use Fantasy\NFL\API\HttpClient;

class Query extends HandlesJsonData
{

    public $uri;

    public $params;

    public function __construct($uri, $params = [])
    {
        $this->uri = $uri;
        $this->params = $params;
    }

    public function param($name, $default = null, $value = null, $required = false, $options = [])
    {
        $this->params[$name] = new Param($name, $default, $value, $required, $options);
        return $this;
    }

    public function setParams(array $params)
    {
        foreach($params as $name => $value)
        {
            $this->set($name, $value);
        }
        return $this;
    }

    public function set($param, $value)
    {
        $this->params[$param]->set($value);
        return $this;
    }

    public function execute()
    {
        $this->responseData = HttpClient::get($this->uri, $this->paramsToArray());
        return $this;
    }

    public function paramsToArray()
    {
        $params = [];
        foreach($this->params as $param)
        {
            if($param->value != null) $params[$param->name] = $param->value;
        }
        return $params;
    }

    public static function define($uri, $params = [])
    {
        return new Query($uri, $params);
    }

}