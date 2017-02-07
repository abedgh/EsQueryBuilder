<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 6:26 PM
 */

namespace Asg\ElasticSearch\Schema;

use Closure;

use Asg\ElasticSearch\Schema\Contracts\BuilderCommandInterface;

class Builder {

    protected $builderCommand = null;

    function __construct(BuilderCommandInterface $builderCommand){
        $this->builderCommand = $builderCommand;
    }

    /**
     * @access: static
     * @param string $index;
     * @param Closure $callback;
     * @return Builder;
     * */
    public static function create($index, Closure $callback){
        return new static(new BuilderCreateCommand($index,$callback));

    }
    /**
     * @return string[];
     * */
    public function toArray(){
        return $this->builderCommand->toArray();
    }

    /**
     * @return string;
     * */
    public function toRaw(){
        return $this->builderCommand->toRaw();
    }




}