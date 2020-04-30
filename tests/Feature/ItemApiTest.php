<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Omochi\Shop\Infrastructure\Eloquents\EloquentItem;
use Tests\TestCase;


/**
 * Class ItemApiTest
 * @package Tests\Feature
 */
class ItemApiTest extends TestCase
{
    use RefreshDatabase;

    private $item = [
        'name' => 'テスト商品',
        'price' => 1000,
        'stock' => 100
    ];


    /**
     * @test
     */
    public function 新規アイテム()
    {
        $item = $this->item;

        $response = $this->json('POST', '/api/item', $item);
        $response
            ->assertStatus(201)
            ->assertJson($item);
    }

    /**
     * @test
     */
    public function アイテム更新()
    {
        $item = factory(EloquentItem::class)->create()->toArray();
        $item['name'] = '更新アイテム';
        $item['price'] = 2000;
        $item['stock'] = 1;

        $response = $this->json('PUT', '/api/item/' . $item['id'], $item);
        $response
            ->assertStatus(200)
            ->json($item);
    }

    /**
     * @test
     */
    public function アイテム削除()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function アイテム取得()
    {
        $item = factory(EloquentItem::class)->create();

        $response = $this->json('GET', '/api/item/' . $item['id']);
        $response
            ->assertStatus(200)
            ->assertJson($item->toArray());

    }
}
