<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 11:28 AM
 */

namespace Asg\ElasticSearch\QueryDSL;


abstract class QueryDSLAbstract {

    protected $name = '';


    /**
     * @return string;
     * */
    public function getName(){
        return $this->name;
    }
    /**
     * @return string;
     * */
    public function raw()
    {
        return json_encode($this->get());
    }
}