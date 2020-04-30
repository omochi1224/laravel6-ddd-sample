<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-29
 * Time: 00:08
 */

declare(strict_types=1);

namespace Omochi\Shop\Application\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Omochi\Shop\Application\Requests\PostItemRequest;
use Omochi\Shop\Application\Service\ItemService;
use Omochi\Shop\Domain\Models\Item\ItemId;
use Omochi\Shop\Domain\Models\Item\ItemName;
use Omochi\Shop\Domain\Models\Item\ItemPrice;
use Omochi\Shop\Domain\Models\Item\Stock;

/**
 * Class ItemController
 * @package Omochi\Shop\Application\Controller
 */
class ItemController extends Controller
{

    /**
     * @var ItemService
     */
    private $itemService;

    /**
     * ItemController constructor.
     * @param ItemService $itemService
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * @param string $id
     * @return JsonResponse
     * @throws \Omochi\Shop\Domain\Exceptions\NotFoundException
     */
    public function get(string $id)
    {
        return response()->json($this->itemService->get(ItemId::of($id))->toArray());
    }

    /**
     * @return Items
     */
    public function allGet(): Items
    {
        return $this->itemService->allItem();
    }

    /**
     * @param PostItemRequest $request
     * @return JsonResponse
     * @throws \App\Exceptions\CreateException
     * @throws \Omochi\Shop\Domain\Models\InvariantException
     */
    public function store(PostItemRequest $request): JsonResponse
    {

        $item = $this->itemService->create(
            ItemId::of((string)Str::uuid()),
            ItemName::of($request->input('name')),
            ItemPrice::of((int)$request->input('price')),
            Stock::of((int)$request->input('stock'))
        );

        return response()->json($item->toArray(), 201);
    }

    /**
     * @param PostItemRequest $request
     * @param string $id
     * @return JsonResponse
     * @throws \Omochi\Shop\Domain\Models\InvariantException
     */
    public function update(PostItemRequest $request, string $id): JsonResponse
    {

        $item = $this->itemService->update(
            ItemId::of($id),
            ItemName::of($request->input('name')),
            ItemPrice::of((int)$request->input('price')),
            Stock::of((int)$request->input('stock'))
        );

        return response()->json($item->toArray(), 200);

    }

    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function delete(Request $request, string $id): JsonResponse
    {
        $item = $this->itemService->delete(ItemId::of($id));
        return response()->json($item, 200);
    }


}
