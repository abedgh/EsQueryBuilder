<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 8:14 PM
 *
 * documentation : https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-match-query.html
 */

namespace Asg\ElasticSearch\QueryDSL;

use Asg\ElasticSearch\QueryDSL\Contracts\QueryDSLInterface;

class Match extends QueryDSLAbstract implements QueryDSLInterface {

    protected $name = 'match';
    protected $field = '';
    protected $queryString = '';
    protected $operator = null;
    protected $zeroTermsQuery = null;
    protected $cutoffFrequency = null;
    /**
     * @param string $field;
     * @param string $queryString;
     * @return Match;
     * */
    public function setQuery($field,$queryString){
        $this->field = trim($field);
        $this->queryString = $queryString;
        $this->zeroTermsQuery = $this->operator = $this->cutoffFrequency = null;
        return $this;
    }

    /**
     * @param string $field;
     * @param string $queryString;
     * @param string|null $operator;
     * @param string|null $zeroTermsQuery;
     * @param float|null $cutoffFrequency;
     * @return Match;
     * */
    public function setQueryString($field,$queryString,$operator = null,$zeroTermsQuery = null,$cutoffFrequency = null){
        $this->field = $field;
        $this->queryString = $queryString;
        if (!is_null($operator) && ($operator == 'and' || $operator == 'or' )) {$this->operator = $operator;}
        if (!is_null($zeroTermsQuery) && ($zeroTermsQuery == 'none' || $zeroTermsQuery == 'all' )) {$this->zeroTermsQuery = $zeroTermsQuery;}
        if (!is_null($cutoffFrequency) && is_numeric($cutoffFrequency)  ) {$this->cutoffFrequency = $cutoffFrequency;}
        return $this;
    }



    /**
     * @description : Return array of string
     * @return array
     * */
    public function get()
    {
        $array[$this->name] = [];

        if ($this->field != '' && $this->queryString != ''){
            $queryArray = [];
            if (!is_null($this->operator) ){
                $queryArray['operator'] = $this->operator;
            }
            if (!is_null($this->zeroTermsQuery) ){
                $queryArray['zero_terms_query'] = $this->zeroTermsQuery;
            }
            if (!is_null($this->cutoffFrequency) ){
                $queryArray['cutoff_frequency'] = $this->cutoffFrequency;
            }
            if (count($queryArray) > 0){
                $queryArray = array_merge(['query' => $this->queryString],$queryArray);
                $array[$this->name]= [$this->field =>$queryArray];
            }else{
                $array[$this->name] = [$this->field => $this->queryString];
            }
        }
        return $array;
    }
}