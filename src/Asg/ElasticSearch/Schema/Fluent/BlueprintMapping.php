<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/28/17
 * Time: 11:17 AM
 */

namespace Asg\ElasticSearch\Schema\Fluent;


use Asg\ElasticSearch\Schema\Contracts\BlueprintFluentInterface;

class BlueprintMapping implements BlueprintFluentInterface{

    /**
     * @var BlueprintFluentInterface[]
     * */
    protected $properties = [];
    /**
     * @var BlueprintFluentInterface[]
     * */
    protected $sources = [];
    protected $attributes = [];
    protected $docType = null;

    function __construct($docType){
        $this->docType = $docType;
    }

    /**
     * @param boolean $bool;
     * @return BlueprintMapping;
     * */
    public function dynamic($bool){
        $this->attributes['dynamic'] = $bool;
        return $this;
    }
    /**
     * @param string $parentDocType;
     * @return BlueprintMapping;
     * */
    public function parent($parentDocType){
        $this->attributes['_parent'] = $parentDocType;
        return $this;
    }
    /**
     * @return BlueprintSource
     * */
    public function sources(){
        $this->sources[] = $source = new BlueprintSource();
        return $source;
    }

    /**
     * @return BlueprintProperty;
     * */
    public function properties(){
        $this->properties[] = $property = new BlueprintProperty();
        return $property;
    }

    /**
     * @return string[];
     * */
    public function get()
    {
        if ( count($sources = $this->getSources()) != 0  ){
            $this->attributes = ['_source'=>$sources]+$this->attributes;
        }
        if ( count($properties = $this->getProperties()) != 0  ){
            $this->attributes['properties'] = $properties;
        }
        return $this->attributes;
    }
    /**
     * @return string[];
     * */
    protected function getSources(){
        $sources = [];
        foreach($this->sources as $source){
            $sources = array_merge($sources,$source->get());
        }
        return $sources;
    }
    protected function getProperties(){
        $properties = [];
        foreach($this->properties as $property){
            $properties = array_merge($properties,$property->get());
        }
        return $properties;
    }

}