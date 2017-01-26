<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 6:52 PM
 */

namespace Asg\ElasticSearch\Schema\Fluent;


class BlueprintSetting {

    protected $noOfShards = 1;
    protected $noOfReplicas = 0;
    protected $dynamic = false;
    /**
     * @param int $noOfShards;
     * @return BlueprintSetting;
     * */
    public function shards($noOfShards){
        $this->noOfShards = $noOfShards;
        //return $this;
    }

    /**
     * @param int $noOfReplicas;
     * @return BlueprintSetting;
     * */
    public function replicas($noOfReplicas){
        $this->noOfReplicas = $noOfReplicas;
        //return $this;
    }
    /**
     * @param boolean $bool;
     * @return BlueprintSetting;
     * */
    public function isDynamic($bool){
        $this->dynamic = $bool;
        //return $this;
    }
    /**
     * @return array;
    */
    public function get(){
        return [
            'number_of_shards' => $this->noOfShards,
            'number_of_replicas' => $this->noOfReplicas,
            'index.mapper.dynamic' => $this->dynamic,
        ];
    }
}