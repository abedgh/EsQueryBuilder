<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 8:07 PM
 */

namespace Asg\ElasticSearch\QueryDSL;

use Asg\ElasticSearch\QueryDSL\Contracts\QueryDSLInterface;

class MatchAll extends QueryDSLAbstract implements QueryDSLInterface{

    protected $name = 'match_all';
    protected $queryString = [];
    protected $boost = null;

    /**
     * @param int $boost;
     * @return MatchAll;
     * */
    public function setBoost($boost){
        if (is_numeric($boost) ){
            $this->boost = $boost;
        }
        return $this;
    }

    public function raw()
    {
        $value = $this->get();
        if ( empty($value[$this->name]) ){
            $this->queryString = new \stdClass();
        }
        return parent::raw();
    }


    /**
     * @description : Return array of string
     * @return array
     * */
    public function get()
    {
        $array = [$this->name => $this->queryString ];
        if ( !is_null($this->boost) ){
            $array = [$this->name => ['boost' => $this->boost]];
        }
        return $array;
    }
}