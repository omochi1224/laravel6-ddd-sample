<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-29
 * Time: 02:32
 */

namespace Omochi\Shop\Infrastructure\Eloquents;


use Omochi\Shop\Domain\Models\Domainable;
use Omochi\Shop\Domain\Models\Item\Item;
use Omochi\Shop\Domain\Models\Item\ItemId;
use Omochi\Shop\Domain\Models\Item\ItemName;
use Omochi\Shop\Domain\Models\Item\ItemPrice;
use Omochi\Shop\Domain\Models\Item\Stock;

/**
 * Class EloquentItem
 * @property string $id
 * @property string $name
 * @property int $price
 * @property int $stock
 * @package Omochi\Shop\Domain\Infrastructure\Eloquents
 */
final class EloquentItem extends AppEloquent implements Domainable
{

    /**
     * @var bool
     */
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'price',
        'stock',
    ];
    /**
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'created_at'
    ];
    /**
     * @var string
     */
    protected $table = 'items';

    /**
     * @return mixed|Item
     * @throws \Omochi\Shop\Domain\Models\InvariantException
     */
    public function toDomain(): Item
    {
        return new Item(
            ItemId::of($this->id),
            ItemName::of($this->name),
            ItemPrice::of($this->price),
            Stock::of($this->stock)
        );
    }
}
