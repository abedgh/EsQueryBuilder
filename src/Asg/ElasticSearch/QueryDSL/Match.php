<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 8:14 PM
 */

namespace Asg\ElasticSearch\QueryDSL;

use Asg\ElasticSearch\QueryDSL\Contracts\QueryDSLInterface;

class Match implements QueryDSLInterface {

    protected $name = 'match';
    protected $field = '';
    protected $queryString = '';
    protected $value = '';
    protected $operator = 'or';
    protected $zeroTermsQuery = 'none';
    protected $cutoffFrequency = 1.0;
    /**
     * @param string $field;
     * @return Match;
     * */
    public function setField($field){
        $this->field = trim($field);
        return $this;
    }
    /**
     * @param string $value;
     * @return Match;
     * */
    public function setValue($value){
        $this->value = $value;
        return $this;
    }
    /**
     * @param string $queryString;
     * @param string|null $operator;
     * @param string|null $zeroTermsQuery;
     * @param float|null $cutoffFrequency;
     * @return Match;
     * */
    public function setQuery($queryString,$operator = null,$zeroTermsQuery = null,$cutoffFrequency = null){
        $this->queryString = $queryString;
        if (!is_null($operator) && ($operator == 'and' || $operator == 'or' )) {$this->operator = $operator;}
        if (!is_null($zeroTermsQuery) && ($zeroTermsQuery == 'none' || $zeroTermsQuery == 'all' )) {$this->zeroTermsQuery = $zeroTermsQuery;}
        if (!is_null($cutoffFrequency) && is_numeric($cutoffFrequency)  ) {$this->cutoffFrequency = $cutoffFrequency;}
        return $this;
    }

    /**
     * @return string;
     * */
    public function raw()
    {
        return json_encode($this->get());
    }

    /**
     * @description : Return array of string
     * @return array
     * */
    public function get()
    {
        $array[$this->name] = [];
        if ($this->value != '' && $this->field != ''){
            $array[$this->name] = [$this->field => $this->value];
        }elseif ($this->field != '' && $this->queryString != ''){
            $array[$this->name]= [
                $this->field => [
                    'query' => $this->queryString,
                    'operator' => $this->operator,
                    'zero_terms_query' => $this->zeroTermsQuery,
                    'cutoff_frequency' => $this->cutoffFrequency
                ]
            ];
        }
        return $array;
    }
}