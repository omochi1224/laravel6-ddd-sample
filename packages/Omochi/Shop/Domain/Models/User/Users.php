<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-30
 * Time: 19:05
 */

namespace Omochi\Shop\Domain\Models\User;


final class Users implements \IteratorAggregate
{
    /**
     * @var \ArrayObject
     */
    private $users;

    /**
     * users constructor.
     */
    public function __construct()
    {
        $this->users = new \ArrayObject();
    }

    /**
     * @param user $user
     */
    public function add(user $user): void
    {
        $this->users[] = $user;
    }

    /**
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        return $this->users->getIterator();

    }
}
