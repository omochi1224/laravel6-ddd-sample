<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-30
 * Time: 18:18
 */

namespace Omochi\Shop\Domain\Models\User;


final class UserName
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
