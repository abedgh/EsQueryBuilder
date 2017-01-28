<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/28/17
 * Time: 11:07 AM
 */

namespace Asg\ElasticSearch\Schema\Contracts;


interface BlueprintSettingInterface {
    /**
     * @return string[];
     * */
    public function get();
}