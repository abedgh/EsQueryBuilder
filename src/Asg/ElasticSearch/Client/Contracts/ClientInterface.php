<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 2/7/17
 * Time: 12:18 PM
 */

namespace Asg\ElasticSearch\Client\Contracts;


interface ClientInterface {


    /**
     * @return
     * */
    public function createIndices();

    /**
     * @return
     * */
    public function deleteIndices();


}