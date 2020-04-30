<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-30
 * Time: 18:19
 */

namespace Omochi\Shop\Domain\Models\User;


final class UserEmail
{
    /**
     * @var string
     */
    private $email;

    /**
     * ItemName constructor.
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $email
     * @return ItemName
     */
    public static function of(string $email): self
    {
        return new static($email);
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->email;
    }
}
