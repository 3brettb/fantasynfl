<?php

namespace Fantasy\NFL\API\Query;

abstract class HandlesJsonData
{

    protected $responseData;

    protected $handlesAsGroup = false;

    public abstract function execute();

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->responseData;
    }

    public function normalize()
    {
        self::normalizeData($this->responseData, $this->handlesAsGroup);
        return $this;
    }

    private static function normalizeData(&$data, $group = false)
    {
        if($group)
        {
            foreach($data as $key => $response)
            {
                if($response->getStatusCode() == 200){
                    $data[$key] = json_decode($response->getBody());
                }
                else {
                    $data[$key] = null;
                }
            }
        }
        else
        {
            if($data->getStatusCode() == 200){
                $data = json_decode($data->getBody());
            }
            else {
                $data = null;
            }
        }
    }

}