<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 12:06 PM
 */

class MatchNoneTest extends PHPUnit_Framework_TestCase{

    /** @test */
    function match_none_empty(){
        $match = new \Asg\ElasticSearch\QueryDSL\MatchNone();
        $this->assertEquals('{"match_none":{}}',$match->raw());
    }

}