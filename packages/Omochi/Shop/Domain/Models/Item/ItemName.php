<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-28
 * Time: 20:07
 */

namespace Omochi\Shop\Domain\Models\Item;


/**
 * Class ItemName
 * @package Omochi\Shop\Domain\Models\Item
 */
final class ItemName
{

    /**
     * @var string
     */
    private $name;

    /**
     * ItemName constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     * @return ItemName
     */
    public static function of(string $name): self
    {
        return new static($name);
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->name;
    }
}
