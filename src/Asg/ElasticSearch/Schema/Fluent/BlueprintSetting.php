<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 6:52 PM
 */

namespace Asg\ElasticSearch\Schema\Fluent;

use Asg\ElasticSearch\Schema\Contracts\BlueprintSettingInterface;

class BlueprintSetting implements BlueprintSettingInterface{

    protected $attributes = [];
    /**
     * @param int $noOfShards;
     * @return BlueprintSetting;
     * */
    public function shards($noOfShards){
        $this->attributes['number_of_shards'] = $noOfShards;
        return $this;
    }

    /**
     * @param int $noOfReplicas;
     * @return BlueprintSetting;
     * */
    public function replicas($noOfReplicas){
        $this->attributes['number_of_replicas'] = $noOfReplicas;
        return $this;
    }
    /**
     * @param boolean $bool;
     * @return BlueprintSetting;
     * */
    public function isDynamic($bool){
        $this->attributes['index.mapper.dynamic'] = $bool;
        return $this;
    }
    /**
     * @return string[];
    */
    public function get(){
        if (count($this->attributes) == 0) {
            return [
                'number_of_shards' => 1,
                'number_of_replicas' => 0,
                'index.mapper.dynamic' => false,
            ];
        }
        return $this->attributes;
    }
}