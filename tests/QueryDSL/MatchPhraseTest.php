<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 11:25 AM
 */

class MatchPhrase extends PHPUnit_Framework_TestCase{

    /** @test */
    function setQuery(){
        $match = new \Asg\ElasticSearch\QueryDSL\MatchPhrase();
        $match->setQuery('message','this is a test');
        $this->assertEquals('{"match_phrase":{"message":"this is a test"}}',$match->raw());
    }

    /** @test */
    function setQueryString(){
        $match = new \Asg\ElasticSearch\QueryDSL\MatchPhrase();
        $match->setQueryString('message','this is a test','my_analyzer');
        $this->assertEquals('{"match_phrase":{"message":{"query":"this is a test","analyzer":"my_analyzer"}}}',$match->raw());
    }
}