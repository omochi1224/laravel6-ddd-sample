<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-29
 * Time: 04:22
 */

declare(strict_types=1);

namespace Omochi\Shop\Application\Service;


use App\Exceptions\CreateException;
use Illuminate\Support\Facades\DB;
use Omochi\Shop\Domain\Models\Item\Item;
use Omochi\Shop\Domain\Models\Item\ItemId;
use Omochi\Shop\Domain\Models\Item\ItemName;
use Omochi\Shop\Domain\Models\Item\ItemPrice;
use Omochi\Shop\Domain\Models\Item\ItemRepository;
use Omochi\Shop\Domain\Models\Item\Items;
use Omochi\Shop\Domain\Models\Item\Stock;

/**
 * Class ItemService
 * @package Omochi\Shop\Application\Service
 */
class ItemService
{

    /**
     * @var ItemRepository
     */
    private $itemRepository;

    /**
     * ItemService constructor.
     * @param ItemRepository $itemRepository
     */
    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @param ItemId $id
     * @param ItemName $name
     * @param ItemPrice $price
     * @param Stock $stock
     * @return Item
     * @throws CreateException
     */
    public function create(ItemId $id, ItemName $name, ItemPrice $price, Stock $stock): Item
    {
        DB::beginTransaction();
        try {

            $itemDomain = new Item($id, $name, $price, $stock);

            $item = $this->itemRepository->store($itemDomain);

            DB::commit();

            return $item;

        } catch (\Exception $exception) {
            report($exception);
            DB::rollback();

            throw new CreateException('新規登録エラー', 500);
        }
    }

    /**
     * @param ItemId $id
     * @return Item
     * @throws \Omochi\Shop\Domain\Exceptions\NotFoundException
     */
    public function get(ItemId $id): Item
    {
        return $this->itemRepository->findById($id);
    }

    /**
     * @param ItemId $id
     * @param ItemName $name
     * @param ItemPrice $price
     * @param Stock $stock
     * @return Item
     */
    public function update(ItemId $id, ItemName $name, ItemPrice $price, Stock $stock): Item
    {
        return $this->itemRepository->update(
            new Item($id, $name, $price, $stock)
        );
    }

    /**
     * @param ItemId $id
     * @return array
     */
    public function delete(ItemId $id): array
    {
        if ($this->itemRepository->delete($id)) {
            return [
                'message' => 'Item deleted successfully'
            ];
        }
    }

    /**
     * @return Items
     */
    public function allItem(): Items
    {
        return $this->itemRepository->findAll();
    }


}
