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
        return new static(new CreateIndexCommand($index,$callback));

    }
    /**
     * @access: static
     * @param string $index;
     * @return Builder;
     * */
    public static function delete($index){
        return new static(new DeleteIndexCommand($index));
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