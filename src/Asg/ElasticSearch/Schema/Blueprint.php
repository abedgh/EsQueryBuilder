<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 6:41 PM
 */

namespace Asg\ElasticSearch\Schema;

use Closure;
use Asg\ElasticSearch\Schema\Fluent\BlueprintMapping;
use Asg\ElasticSearch\Schema\Fluent\BlueprintSetting;
use Asg\ElasticSearch\Schema\Contracts\BlueprintFluentInterface;

class Blueprint {

    protected $index = null;
    /**
     * @var BlueprintFluentInterface[]
     * */
    protected $settings = [];
    /**
     * @var BlueprintFluentInterface[]
     * */
    protected $mappings = [];

    /**
     * Create a new schema blueprint.
     * @param $index
     * @param  Closure|null $callback
     */
    public function __construct($index, Closure $callback = null)
    {
        $this->index = trim($index);
        if (!is_null($callback)) {
            $callback($this);
        }
    }
    /**
     * @return string[];
     * */
    public function build(){

        $build = [
            'index' =>$this->index,
        ];
        $settings = $this->getSettings();
        $mappings = $this->getMappings();
        if (count($settings) > 0){
            $build['body']['settings'] = $settings;
        }
        if (count($mappings) > 0){
            $build['body']['mappings'] = $mappings;
        }
        return $build;
    }
    /**
     * @return string;
     * */
    public function buildRaw(){
        return json_encode($this->build());
    }
    /**
     * @return BlueprintSetting;
     * */
    public function settings(){
        $this->settings[] = $setting = new BlueprintSetting();
        return $setting;
    }
    /**
     * @param string $docType;
     * @return BlueprintMapping
     * */
    public function mappings($docType){
        $this->mappings[$docType][] = $mapping = new BlueprintMapping($docType);
        return $mapping;
    }
    /**
     * @return string[];
     * @internal BlueprintFluentInterface $item;
     * */
    protected function getMappings(){
        $mappings = [];
        foreach($this->mappings as $docType=>$mapping){
            $mappings[$docType] = [];
            foreach($mapping as $item) {
                $mappings[$docType] = array_merge($mappings[$docType], $item->get());
            }
        }
        return $mappings;
    }
    /**
     * @return string[];
     * */
    protected function getSettings(){
        $settings = [];
        foreach($this->settings as $setting){
            $settings = array_merge($settings,$setting->get());
        }
        return $settings;
    }
}