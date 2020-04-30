<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-28
 * Time: 20:05
 */

declare(strict_types=1);

namespace Omochi\Shop\Domain\Models\Item;

use Omochi\Shop\Domain\Models\Identifier;

/**
 * Class Item
 * @package Omochi\Shop\Domain\Models\Item
 */
final class Item
{

    /**
     * @var Identifier
     */
    private $id;
    /**
     * @var ItemName
     */
    private $name;
    /**
     * @var ItemPrice
     */
    private $price;
    /**
     * @var Stock
     */
    private $stock;

    /**
     * Item constructor.
     * @param Identifier $id
     * @param ItemName $name
     * @param ItemPrice $price
     * @param Stock $stock
     */
    public function __construct(
        Identifier $id,
        ItemName $name,
        ItemPrice $price,
        Stock $stock
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    /**
     * @return Identifier
     */
    public function getId(): Identifier
    {
        return $this->id;
    }

    /**
     * @return ItemName
     */
    public function getName(): ItemName
    {
        return $this->name;
    }

    /**
     * @return ItemPrice
     */
    public function getPrice(): ItemPrice
    {
        return $this->price;
    }

    /**
     * @return Stock
     */
    public function getStock(): Stock
    {
        return $this->stock;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'price' => $this->price->value(),
            'stock' => $this->stock->value(),
        ];
    }

}
