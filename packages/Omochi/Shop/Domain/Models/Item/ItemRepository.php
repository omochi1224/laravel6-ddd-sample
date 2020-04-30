<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-29
 * Time: 03:22
 */

namespace Omochi\Shop\Domain\Models\Item;


use Omochi\Shop\Domain\Exceptions\NotFoundException;

/**
 * Interface ItemRepository
 * @package Omochi\Shop\Domain\Models\Item
 */
interface ItemRepository
{

    /**
     * @param ItemId $id
     * @return Item
     * @throws NotFoundException
     */
    public function findById(ItemId $id): Item;

    /**
     * @return Items
     */
    public function findAll(): Items;

    /**
     * @param Item $item
     * @return Item
     */
    public function store(Item $item): Item;

    /**
     * @param Item $item
     * @return Item
     */
    public function update(Item $item): Item;

    /**
     * @param ItemId $id
     * @return bool
     */
    public function delete(ItemId $id): bool;
}
