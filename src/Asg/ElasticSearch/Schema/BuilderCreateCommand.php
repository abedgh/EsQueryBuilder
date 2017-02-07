<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 2/7/17
 * Time: 11:48 AM
 */

namespace Asg\ElasticSearch\Schema;

use Closure;
use Asg\ElasticSearch\Schema\Contracts\BuilderCommandInterface;

class BuilderCreateCommand implements BuilderCommandInterface{

    protected $builder;

    /**
     * @param $index
     * @param callable $callback
     */
    function __construct($index,Closure $callback = null){
        if (!is_null($callback) && $callback instanceof Closure){
            $this->callback = $callback;
        }
        $this->index = $index;
    }
    /**
     * @return string[];
     * */
    public function toArray()
    {
        $blueprint = $this->createBlueprint($this->index,$this->callback);
        return $this->buildBlueprint($blueprint);
    }

    /**
     * @return string;
     * */
    public function toRaw()
    {
        $blueprint = $this->createBlueprint($this->index,$this->callback);
        return $this->buildRawBlueprint($blueprint);
    }
    /**
     * @param Blueprint $blueprint
     * @return string[];
     * */
    protected function buildBlueprint(Blueprint $blueprint){
        return $blueprint->build();
    }
    /**
     * @param Blueprint $blueprint
     * @return string;
     * */
    protected function buildRawBlueprint(Blueprint $blueprint){
        return $blueprint->buildRaw();
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