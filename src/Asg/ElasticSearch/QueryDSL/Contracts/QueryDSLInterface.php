<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 8:17 PM
 */

namespace Asg\ElasticSearch\QueryDSL\Contracts;


interface QueryDSLInterface {

    /**
     * @return string;
     * */
    public function getName();
    /**
     * @description : Return Json object
     * @return string;
     * */
    public function raw();

    /**
     * @description : Return array of string
     * @return array
     * */
    public function get();


}