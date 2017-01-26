<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 8:14 PM
 */

namespace Asg\ElasticSearch\QueryDSL;

use Asg\ElasticSearch\QueryDSL\Contracts\QueryDSLInterface;

class MatchPhrase extends QueryDSLAbstract implements QueryDSLInterface{

    protected $name = 'match_phrase';
    protected $field = '';
    protected $queryString = '';
    protected $analyzer = null;
    /**
     * @param string $field;
     * @param string $queryString;
     * @return MatchPhrase;
     * */
    public function setQuery($field,$queryString){
        $this->field = trim($field);
        $this->queryString = $queryString;
        $this->analyzer = null;
        return $this;
    }

    /**
     * @param string $field;
     * @param string $queryString;
     * @param string|null $analyzer;
     * @return MatchPhrase;
     * */
    public function setQueryString($field,$queryString,$analyzer = null){
        $this->field = trim($field);
        $this->queryString = $queryString;
        $this->analyzer = $analyzer;
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
            if ( !is_null($this->analyzer) ){
                $array[$this->name] = [
                    $this->field => [
                        'query' => $this->queryString,
                        'analyzer' => $this->analyzer
                    ]
                ];
            }else{
                $array[$this->name] = [$this->field => $this->queryString];
            }
        }
        return $array;
    }
}