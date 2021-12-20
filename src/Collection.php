<?php

namespace App;
use ArrayAccess;
use Countable;
use Exception;
use IteratorAggregate;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use JetBrains\PhpStorm\Internal\TentativeType;
use Traversable;

class Collection implements Countable, ArrayAccess, IteratorAggregate
{
    public function __construct(protected array $items)
    {

    }

    static function make(array $items){
       return new static($items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)){
            $this->items[] = $value;
        }else{
            $this->items[$offset] = $value;

        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->items);
    }
}