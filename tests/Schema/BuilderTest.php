<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 6:28 PM
 */

class builderTest extends PHPUnit_Framework_TestCase{

    /** @test */
    public function createIndexSchema(){

        \Asg\ElasticSearch\Schema\Builder::create('my_index',function(){});
        $this->assertTrue(true);
    }

}