<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/26/17
 * Time: 6:28 PM
 */

use \Asg\ElasticSearch\Schema\Builder;
use \Asg\ElasticSearch\Schema\Blueprint;

class builderTest extends PHPUnit_Framework_TestCase{

    /** @test */
    public function createIndexSchemaWithMappings(){
        $result = Builder::create('my_index',function(Blueprint $blueprint){
            $blueprint->mappings('my_type')
                ->properties()
                ->string('field_1')
                ->string('field_2');
        })->toArray();
        $expected = [
            'index' => 'my_index',
            'body' => ['mappings' =>['my_type' => [
                            'properties' => [
                                'field_1' => ['type'=> 'string'], 'field_2' => ['type'=> 'string']
                            ]]]]];

        $this->assertEquals($expected,$result);
    }
    /** @test */
    public function createIndexSchemaWithSettings(){
        $result = Builder::create('my_index',function(Blueprint $blueprint){
            $blueprint->settings()->replicas(2);
            $blueprint->settings()->shards(4);
        })->toArray();
        $expected = [
            'index' => 'my_index','body'=>['settings'=>['number_of_replicas'=>2,'number_of_shards'=>4]]];

        $this->assertEquals($expected,$result);
    }
}