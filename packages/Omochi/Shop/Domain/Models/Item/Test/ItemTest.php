<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-28
 * Time: 20:12
 */


namespace Omochi\Shop\Domain\Models\Item\Test;

use Illuminate\Support\Str;
use Omochi\Shop\Domain\Models\Item\Item;
use Omochi\Shop\Domain\Models\Item\ItemId;
use Omochi\Shop\Domain\Models\Item\ItemName;
use Omochi\Shop\Domain\Models\Item\ItemPrice;
use Omochi\Shop\Domain\Models\Item\Items;
use Omochi\Shop\Domain\Models\Item\Stock;
use PHPUnit\Framework\TestCase;

/**
 * Class ItemTest
 * @package Omochi\Shop\Domain\Models\Item\Test
 */
class ItemTest extends TestCase
{

    /**
     * @test
     */
    public function 直近値()
    {

        $params = new \stdClass();
        $params->uuid = Str::uuid();
        $params->name = 'テスト商品';
        $params->price = 1000;
        $params->stock = 10;

        $item = new Item(
            ItemId::of($params->uuid),
            ItemName::of($params->name),
            ItemPrice::of($params->price),
            Stock::of($params->stock)
        );

        $this->assertIsObject($item);
        $this->assertEquals($params->uuid, $item->getId()->value());
        $this->assertEquals($params->name, $item->getName()->value());
        $this->assertEquals($params->price, $item->getPrice()->value());
        $this->assertEquals($params->stock, $item->getStock()->value());
    }


    /**
     * @test
     */
    public function 複数Domain()
    {
        $params = new \stdClass();
        $params->uuid = Str::uuid();
        $params->name = 'テスト商品';
        $params->price = 1000;
        $params->stock = 10;

        for ($i = 0; $i < 10; $i++) {

            $item = new Item(
                ItemId::of($params->uuid),
                ItemName::of($params->name),
                ItemPrice::of($params->price),
                Stock::of($params->stock)
            );
            $items = new Items();
            $items->add($item);
        }

        $this->assertIsIterable($items);

    }

}
