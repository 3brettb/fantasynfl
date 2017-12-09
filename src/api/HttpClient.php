<?php

namespace Fantasy\NFL\API;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class HttpClient
{

    public static $http = "http";

    public static $api_default = "api.fantasy.nfl.com/v1";

    public static $format = "json";

    public static function get($uri, $options = null)
    {
        $client = new Client();
        return $client->get(self::formRequestUri($uri, $options));
    }

    public static function getGroup(array $uris)
    {
        $client = new Client();

        $promises = [];
        $output = [];
        foreach($uris as $key => $value)
        {
            if(is_array($value)){
                $uri = $value[0];
                $options = $value[1];
            } else {
                $uri = $value;
                $options = null;
            }

            $request = new Request('GET', self::formRequestUri($uri, $options));
            $promise = $client->sendAsync($request)->then(function($response) use ($key, &$output){
                $output[$key] = $response;
            });
            array_push($promises, $promise);
        }
        foreach($promises as $promise)
        {
            $promise->wait();
        }
        return $output;
    }

    private static function normalizeUri($uri)
    {
        $api = config('fantasynfl.api.uri', static::$api_default);
        return self::$http."://".$api.$uri;
    }

    private static function formRequestUri($uri, $options = [])
    {
        $uri = self::normalizeUri($uri);
        $options["format"] = self::$format;

        $formed = [];
        foreach($options as $name => $value)
        {
            array_push($formed, $name."=".$value);
        }

        $formed_request = $uri."?".implode("&", $formed);
        echo "Formed Request: ".$formed_request.PHP_EOL;
        return $formed_request;
    }

}