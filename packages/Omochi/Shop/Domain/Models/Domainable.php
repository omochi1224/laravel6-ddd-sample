<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-29
 * Time: 02:33
 */

namespace Omochi\Shop\Domain\Models;


/**
 * Interface Domainable
 * @package Omochi\Shop\Domain
 */
interface Domainable
{

    /**
     * @return mixed
     */
    public function toDomain();
}
