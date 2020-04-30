<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-29
 * Time: 15:33
 */

namespace Omochi\Shop\Application\Requests;

/**
 * Class PostItemRequest
 * @package Omochi\Shop\Application\Requests
 */
class PostItemRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        //バリデーションルール
        return [
            'name' => 'required|string|min:0',
            'price' => 'required|int|min:0',
            'stock' => 'required|int|min:0',
        ];
    }
}
