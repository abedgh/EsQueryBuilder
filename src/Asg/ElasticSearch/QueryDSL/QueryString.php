<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 8:16 PM
 */

namespace Asg\ElasticSearch\QueryDSL;

use Asg\ElasticSearch\QueryDSL\Contracts\QueryDSLInterface;

class QueryString extends QueryDSLAbstract implements QueryDSLInterface  {

    protected $name = 'query_string';
    protected $field = '';
    protected $queryString = '';


    /**
     * @param string $field;
     * @param string $queryString;
     * @return Match;
     * */
    public function setQuery($field,$queryString){
        $this->field = trim($field);
        $this->queryString = $queryString;
        return $this;
    }
    /**
     * @description : Return array of string
     * @return array
     * */
    public function get()
    {
        throw new \Exception('Method not implement');
    }
}