<?php

namespace Fantasy\NFL\FantasyNFL\Common;

class MapProperty
{

    private $property;

    private $mapToClass;

    private $dataIsArray;

    public function __construct($property, $mapToClass = null, $dataIsArray = false)
    {
        $this->property = $property;
        $this->mapToClass = $mapToClass;
        $this->dataIsArray = ($dataIsArray && ($mapToClass != null));
    }

    public function map(&$model, $data)
    {
        $p = $this->property;
        if($this->mapToClass != null){

            self::checkForJson($data, $p, $this->mapToClass::handlesJson(), $this->dataIsArray);

            if($this->dataIsArray) {
                $this->mapArray($model, $data);
            } else {
                $model->$p = $this->mapToClass::create($data->$p);
            }
        } else {
            $model->$p = $data->$p;
        }
    }

    private function mapArray(&$model, $data)
    {
        $p = $this->property;
        $model->$p = collect();

        if($data->$p != null && (self::testIsArray($data->$p))) {
            foreach ($data->$p as $item) {
                $model->$p->push($this->mapToClass::create($item));
            }
        }
    }

    private static function testIsArray($obj)
    {
        if(is_array($obj)) return true;
        else if(!is_object($obj)) return false;
        else {
            return get_class($obj) === get_class(collect());
        }
    }

    private static function checkForJson(&$data, $property, $canHandleJson, $isArray)
    {
        if($canHandleJson && is_string($data->$property))
        {
            try{
                $decoded = json_decode($data->$property);
                if($isArray && $decoded != null){
                    $data->$property = JsonObject::asDecodedArray($decoded);
                } else if($decoded == null) {
                    $data->$property = null;
                } else {
                    $data->$property = JsonObject::asDecoded($decoded);
                }
            } catch (\ErrorException $e) {
                return;
            }
        }
    }

}