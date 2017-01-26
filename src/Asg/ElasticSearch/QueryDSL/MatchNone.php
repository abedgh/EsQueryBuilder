<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 8:10 PM
 */

namespace Asg\ElasticSearch\QueryDSL;

use Asg\ElasticSearch\QueryDSL\Contracts\QueryDSLInterface;

class MatchNone extends QueryDSLAbstract implements QueryDSLInterface {
    protected $name = 'match_none';
    protected $queryString = [];

    public function raw()
    {
        $this->queryString = new \stdClass();
        return parent::raw();
    }


    /**
     * @description : Return array of string
     * @return array
     * */
    public function get()
    {
        return [$this->name => $this->queryString];
    }
}