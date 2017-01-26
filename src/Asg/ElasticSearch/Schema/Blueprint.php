<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 6:41 PM
 */

namespace Asg\ElasticSearch\Schema;

use Closure;
use Asg\ElasticSearch\Schema\Fluent\BlueprintSetting;

class Blueprint {

    protected $index = null;

    protected $collection = [];
    /**
     * @var BlueprintSetting[]
     * */
    protected $settings = [];

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
    public function create(){

    }
    public function build(){
        foreach($this->settings as $setting){
            print_r($setting->get());
        }
        //var_dump($this->settings);
    }
    /**
     * @return BlueprintSetting;
     * */
    public function settings(){
        $this->settings[] = $setting = new BlueprintSetting();
        return $setting;
    }
}