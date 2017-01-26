<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 12:02 PM
 */

class MatchAllTest extends PHPUnit_Framework_TestCase{

    /** @test */
    function match_all_empty(){
        $match = new \Asg\ElasticSearch\QueryDSL\MatchAll();
        $this->assertEquals('{"match_all":{}}',$match->raw());
    }
    /** @test */
    function match_all_with_boost(){
        $match = new \Asg\ElasticSearch\QueryDSL\MatchAll();
        $match->setBoost(1.2);
        $this->assertEquals('{"match_all":{"boost":1.2}}',$match->raw());
    }
}