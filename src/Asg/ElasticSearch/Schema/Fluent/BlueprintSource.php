<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/28/17
 * Time: 11:57 AM
 */

namespace Asg\ElasticSearch\Schema\Fluent;


use Asg\ElasticSearch\Schema\Contracts\BlueprintFluentInterface;

class BlueprintSource implements BlueprintFluentInterface{

    protected $attributes = [];

    /**
     * @param boolean $bool;
     * @return BlueprintSource
     * */
    public function enabled($bool){
        $this->attributes['enabled'] = $bool;
        return $this;
    }
    /**
     * @param string[] $includeFields;
     * @return BlueprintSource
     * */
    public function includes(array $includeFields){
        $this->attributes['includes'] = $includeFields;
        return $this;
    }
    /**
     * @param string[] $excludeFields;
     * @return BlueprintSource
     * */
    public function excludes(array $excludeFields){
        $this->attributes['excludes'] = $excludeFields;
        return $this;
    }
    /**
     * @return string[];
     * */
    public function get()
    {
        return $this->attributes;
    }
}