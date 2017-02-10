<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 2/10/17
 * Time: 8:25 PM
 */

namespace Asg\ElasticSearch\Schema;


use Asg\ElasticSearch\Schema\Contracts\BuilderCommandInterface;

class DeleteIndexCommand implements BuilderCommandInterface{


    protected $index;
    /**
     * @param string $index;
     * */
    function __construct($index){
        $this->index = trim($index);
    }
    /**
     * @return string[];
     * */
    public function toArray()
    {
        return ['index'=>$this->index];
    }

    /**
     * @return string;
     * */
    public function toRaw()
    {
        return json_encode($this->toArray());
    }
}