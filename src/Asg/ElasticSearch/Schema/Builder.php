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
    /**
     * @param string $index;
     * @param Closure $callback;
     * @return string[];
     * */
    public function create($index, Closure $callback){
        $blueprint = $this->createBlueprint($index,$callback);
        return $this->buildBlueprint($blueprint);
    }

    protected function buildBlueprint(Blueprint $blueprint){
        return $blueprint->build();
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