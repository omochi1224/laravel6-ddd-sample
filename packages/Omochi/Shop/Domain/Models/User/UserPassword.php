<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-30
 * Time: 18:20
 */

namespace Omochi\Shop\Domain\Models\User;


final class UserPassword
{
    /**
     * @var string
     */
    private $password;

    /**
     * ItemName constructor.
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * @param string $password
     * @return UserPassword
     */
    public static function of(string $password): self
    {
        return new static($password);
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->name;
    }
}
