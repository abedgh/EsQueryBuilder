<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 6:26 PM
 */

namespace Asg\ElasticSearch\Schema;

use Closure;

class Builder {

    protected $index = null;
    protected $callback = null;


    public static function newBuilder()
    {
        return new static();
    }

    public function create($index, Closure $callback){
        $blueprint = $this->createBlueprint($index,$callback);
        $blueprint->create();
        //$callback($blueprint);
        $this->buildBlueprint($blueprint);
    }
    /**
     * @return array;
     * */
    public function build(){

    }
    /**
     * @return string;
     * */
    public function buildRaw(){

    }

    protected function buildBlueprint(Blueprint $blueprint){
        $blueprint->build();
    }
    /**
     * @param string $index;
     * @param Closure $callback;
     * @return Blueprint;
     * */
    protected function createBlueprint($index,Closure $callback){
        return new Blueprint($index, $callback);
    }

}