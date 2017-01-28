<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/28/17
 * Time: 11:17 AM
 */

namespace Asg\ElasticSearch\Schema\Fluent;


use Asg\ElasticSearch\Schema\Contracts\BlueprintSettingInterface;

class BlueprintMapping implements BlueprintSettingInterface{

    protected $properties = [];
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
        // TODO: Implement get() method.
    }


}