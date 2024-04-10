<?php

namespace Tests;

use AdrianLux\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends  TestCase
{
    /** @test */
    function it_wraps_an_array_of_items(){
        $collection = Collection::make([1,34,"A","BC"]);

        $this->assertCount(4, $collection);

    }

    /** @test */
    function it_mimics_an_array(){
        $collection = Collection::make([1,34,"A","BC"]);

        $this->assertEquals(1, $collection[0]);

    }

    /** @test */
    function it_can_be_iterated(){
        $collection = Collection::make([1,34,"A","BC"]);

        $this->assertInstanceOf(\IteratorAggregate::class,$collection);

        foreach ($collection as $index => $item){
            $this->assertEquals( $collection[$index], $item);
        }
    }


}
