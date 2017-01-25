<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 8:20 PM
 */

class MatchTest extends PHPUnit_Framework_TestCase{

    /** @test */
    function setField_and_setValue(){
        $match = new \Asg\ElasticSearch\QueryDSL\Match();
        $match->setField('message');

        $match->setValue('this is a test');
        $this->assertEquals('{"match":{"message":"this is a test"}}',$match->raw());
    }
    /** @test */
    function setQuery(){
        $match = new \Asg\ElasticSearch\QueryDSL\Match();
        $match->setField('message');
        $match->setQuery('this is a test','or','none',1);
        $this->assertEquals('{"match":{"message":{"query":"this is a test","operator":"or","zero_terms_query":"none","cutoff_frequency":1}}}',$match->raw());
    }
}