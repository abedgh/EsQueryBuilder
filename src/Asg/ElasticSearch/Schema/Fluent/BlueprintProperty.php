<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/28/17
 * Time: 11:27 AM
 */

namespace Asg\ElasticSearch\Schema\Fluent;


use Asg\ElasticSearch\Schema\Contracts\BlueprintFluentInterface;

class BlueprintProperty implements BlueprintFluentInterface {

    protected $attributes = [];

    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function string($field,$attributes = []){
        $this->addField($field,'string',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function long($field,$attributes = []){
        $this->addField($field,'long',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function integer($field,$attributes = []){
        $this->addField($field,'integer',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function short($field,$attributes = []){
        $this->addField($field,'short',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function byte($field,$attributes = []){
        $this->addField($field,'byte',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function double($field,$attributes = []){
        $this->addField($field,'double',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function float($field,$attributes = []){
        $this->addField($field,'float',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function date($field,$attributes = []){
        $this->addField($field,'date',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function boolean($field,$attributes = []){
        $this->addField($field,'boolean',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function binary($field,$attributes = []){
        $this->addField($field,'binary',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function geoPoint($field,$attributes = []){
        $this->addField($field,'geo_point',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function geoShape($field,$attributes = []){
        $this->addField($field,'geo_shape',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function ip($field,$attributes = []){
        $this->addField($field,'ip',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function completion($field,$attributes = []){
        $this->addField($field,'completion',$attributes);
        return $this;
    }
    /**
     * @param string $field;
     * @param string[] $attributes;
     * @return BlueprintProperty;
     * */
    public function custom($field,array $attributes){
        if (isset($attributes['type']) && $attributes['type']!= ''){
            $type = $attributes['type'];
            unset($attributes['type']);
            $this->addField($field,$type,$attributes);
        }
        return $this;
    }

    protected function addField($field,$type,$attributes){
        $attributes = array_merge(['type' => $type],$attributes);
        $this->attributes[$field] = $attributes;
    }

    /**
     * @return string[];
     * */
    public function get()
    {
        return $this->attributes;
    }
}