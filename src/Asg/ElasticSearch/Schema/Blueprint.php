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
use Asg\ElasticSearch\Schema\Contracts\BlueprintSettingInterface;

class Blueprint {

    public static $counter = 0 ;
    protected $index = null;

    protected $collection = [];
    /**
     * @var BlueprintSettingInterface[]
     * */
    protected $settings = [];

    protected $mappings = [];
    /**
     * Create a new schema blueprint.
     * @param $index
     * @param  Closure|null $callback
     */
    public function __construct($index, Closure $callback = null)
    {
        self::$counter++;
        var_dump(self::$counter);
        $this->index = trim($index);
        if (!is_null($callback)) {
            $callback($this);
        }
    }
    public function create(){

    }
    public function build(){

        $s = [];
        foreach($this->settings as $setting){
            $s = array_merge($s,$setting->get());

        }
        var_dump($s);
        var_dump(self::$counter);
        //var_dump($this->settings);
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
        $this->mappings[$docType] = $mapping = new BlueprintMapping($docType);
        return $mapping;
    }
}