<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/25/17
 * Time: 8:14 PM
 */

namespace Asg\ElasticSearch\QueryDSL;

use Asg\ElasticSearch\QueryDSL\Contracts\QueryDSLInterface;

class Term extends QueryDSLAbstract implements QueryDSLInterface {

    protected $name = 'term';
    protected $field = '';
    protected $value = '';
    protected $boost = null;

    /**
     * @param string $field;
     * @param string $value;
     * @return Term;
    */
    public function setTerm($field,$value){
        $this->$field = trim($field);
        $this->value = $value;
        return $this;
    }
    /**
     * @description : Return array of string
     * @return array
     * */
    public function get()
    {
        // TODO: Implement get() method.
    }
}