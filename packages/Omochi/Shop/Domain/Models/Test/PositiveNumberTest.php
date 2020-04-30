<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-28
 * Time: 19:21
 */

namespace Omochi\Shop\Models\Test;

use Omochi\Shop\Domain\Models\InvariantException;
use Omochi\Shop\Domain\Models\PositiveNumber;
use Tests\TestCase;

/**
 * Class PositiveNumberTest
 * @package Omochi\Shop\Models\Test
 */
class PositiveNumberTest extends TestCase
{

    /**
     * @test
     */
    public function 正の数()
    {
        $this->assertSame(1, ConcretePositiveNumber::of(1)->value());
    }

    /**
     * @test
     */
    public function 負の数()
    {
        $this->expectException(InvariantException::class);
        ConcretePositiveNumber::of(-1);
    }

}

class ConcretePositiveNumber extends PositiveNumber
{
}

