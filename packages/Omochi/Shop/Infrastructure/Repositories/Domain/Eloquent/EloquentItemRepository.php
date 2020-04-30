<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-29
 * Time: 03:24
 */

declare(strict_types=1);

namespace Omochi\Shop\Infrastructure\Repositories\Domain\Eloquent;


use Omochi\Shop\Domain\Exceptions\NotFoundException;
use Omochi\Shop\Domain\Models\Item\Item;
use Omochi\Shop\Domain\Models\Item\ItemId;
use Omochi\Shop\Domain\Models\Item\ItemRepository;
use Omochi\Shop\Domain\Models\Item\Items;
use Omochi\Shop\Infrastructure\Eloquents\EloquentItem;

/**
 * Class EloquentItemRepository
 * @package Omochi\Shop\Domain\Infrastructure\Repositories\Domain\Eloquent
 */
final class EloquentItemRepository implements ItemRepository
{

    /**
     * @var EloquentItem
     */
    private $eloquent;

    /**
     * EloquentItemRepository constructor.
     * @param EloquentItem $eloquent
     */
    public function __construct(EloquentItem $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param ItemId $id
     * @return Item
     * @throws NotFoundException
     */
    public function findById(ItemId $id): Item
    {
        $item = $this->eloquent->find($id->value());
        if (empty($item)) {
            throw new NotFoundException();
        }

        return $item->toDomain();
    }

    /**
     * @return Items
     */
    public function findAll(): Items
    {
        $iterateItems = new Items();
        foreach ($this->eloquent->all() as $item) {
            $iterateItems->add($item->toDomain());
        }

        return $iterateItems;
    }

    /**
     * @param Item $item
     * @return Item
     */
    public function store(Item $item): Item
    {
        (new EloquentItem($item->toArray()))->save();
        return $item;
    }

    /**
     * @param Item $item
     * @return Item
     * @throws NotFoundException
     */
    public function update(Item $item): Item
    {
        $oldItem = $this->eloquent->where('id', $item->getId()->value())->get();

        if ($oldItem->isEmpty()) {
            throw new NotFoundException();
        }

        EloquentItem::where('id', $item->getId()->value())
            ->update($item->toArray());

        $newItem = $this->eloquent->find($item->getId()->value());
        return $newItem->toDomain();

    }

    /**
     * @param ItemId $id
     * @return bool
     * @throws NotFoundException
     */
    public function delete(ItemId $id): bool
    {
        $item = $this->eloquent->find($id->value());

        if (empty($item)) {
            throw new NotFoundException();
        }

        return $item->delete();
    }
}
