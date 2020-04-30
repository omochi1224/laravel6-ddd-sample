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
            'name' => 'required|string',
            'price' => 'required|int',
            'stock' => 'required|int',
        ];
    }
}
