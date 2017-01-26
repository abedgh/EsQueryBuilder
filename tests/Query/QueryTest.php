<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 7:46 PM
 */

class QueryTest extends PHPUnit_Framework_TestCase{


    /** @test */
    public function create_instance_of_query_and_query_bool(){

        $mock = $this->getMock(\Asg\ElasticSearch\QueryDSL\Contracts\QueryDSLInterface::class);

        $query = new \Asg\ElasticSearch\Query\Query($mock);
        $this->assertInstanceOf(\Asg\ElasticSearch\Query\Query::class,$query);

        $queryBool = new \Asg\ElasticSearch\Query\QueryBool();
        $this->assertInstanceOf(\Asg\ElasticSearch\Query\QueryBool::class,$queryBool);
    }
    /** @test */
    public function create_instance_of_must_should_must_not(){
        $must = new \Asg\ElasticSearch\Occurrence\Must();
        $this->assertInstanceOf(\Asg\ElasticSearch\Occurrence\Must::class,$must);

        $should = new \Asg\ElasticSearch\Occurrence\Should();
        $this->assertInstanceOf(\Asg\ElasticSearch\Occurrence\Should::class,$should);

        $mustNot = new \Asg\ElasticSearch\Occurrence\MustNot();
        $this->assertInstanceOf(\Asg\ElasticSearch\Occurrence\MustNot::class,$mustNot);
    }
    /** @test1 */
    public function create_instance_of_dsl_match_all(){
        /*$matchAll = new \Asg\ElasticSearch\QueryDSL\MatchAll();
        $this->assertInstanceOf(\Asg\ElasticSearch\QueryDSL\MatchAll::class,$matchAll);

        $matchNone = new \Asg\ElasticSearch\QueryDSL\MatchNone();
        $this->assertInstanceOf(\Asg\ElasticSearch\QueryDSL\MatchNone::class,$matchNone);

        $match = new \Asg\ElasticSearch\QueryDSL\Match();
        $this->assertInstanceOf(\Asg\ElasticSearch\QueryDSL\Match::class,$match);

        $matchPhrase = new \Asg\ElasticSearch\QueryDSL\MatchPhrase();
        $this->assertInstanceOf(\Asg\ElasticSearch\QueryDSL\MatchPhrase::class,$matchPhrase);

        $term = new \Asg\ElasticSearch\QueryDSL\Term();
        $this->assertInstanceOf(\Asg\ElasticSearch\QueryDSL\Term::class,$term);*/
    }
}