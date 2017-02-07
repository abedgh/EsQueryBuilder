<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 2/7/17
 * Time: 11:47 AM
 */

namespace Asg\ElasticSearch\Schema\Contracts;


interface BuilderCommandInterface {
    /**
     * @return string[];
     * */
    public function toArray();

    /**
     * @return string;
     * */
    public function toRaw();
}