<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 7:49 PM
 */

namespace Asg\ElasticSearch\Query;

use Asg\ElasticSearch\QueryDSL\Contracts\QueryDSLInterface;

class Query {


    protected $queryDSL = null;


    function __construct(QueryDSLInterface $queryDSL){
        $this->queryDSL = $queryDSL;
    }

    public function raw(){
        return json_encode(['query' => json_decode($this->queryDSL->raw())]);
    }

    public function get(){
        return ['query'=> $this->queryDSL->get()];
    }
}