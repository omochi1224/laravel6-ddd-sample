<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-28
 * Time: 19:43
 */

namespace Omochi\Shop\Models\Test;

use Illuminate\Support\Str;
use Omochi\Shop\Domain\Models\Identifier;
use PHPUnit\Framework\TestCase;

/**
 * Class IdentifierTest
 * @package Omochi\Shop\Models\Test
 */
class IdentifierTest extends TestCase
{

    /**
     * @test
     */
    public function Equals()
    {
        $uuid = Str::uuid();
        $id = ConcreteIdentifier::of($uuid);
        $this->assertIsString($id->value());
        $this->assertIsBool($id->equals($id));
        $this->assertEquals($uuid, $id->value());
    }
}

/**
 * Class ConcreteIdentifier
 * @package Omochi\Shop\Models\Test
 */
class ConcreteIdentifier extends Identifier
{
}
