<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-28
 * Time: 20:46
 */

namespace Omochi\Shop\Domain\Models\Item;


use Traversable;

/**
 * Class Items
 * @package Omochi\Shop\Domain\Models\Item
 */
final class Items implements \IteratorAggregate
{

    /**
     * @var \ArrayObject
     */
    private $items;

    /**
     * Items constructor.
     */
    public function __construct()
    {
        $this->items = new \ArrayObject();
    }

    /**
     * @param Item $item
     */
    public function add(Item $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        return $this->items->getIterator();
    }
}
