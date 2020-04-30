<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-30
 * Time: 18:26
 */

namespace Omochi\Shop\Domain\Models\User;


/**
 * Interface UserRepository
 * @package Omochi\Shop\Domain\Models\User
 */
interface UserRepository
{

    /**
     * @param User $user
     * @return bool
     */
    public function register(User $user): bool;

    /**
     * @param UserId $id
     * @param User $user
     * @return User
     */
    public function update(UserId $id, User $user): User;

    /**
     * @param UserId $id
     * @return bool
     */
    public function delete(UserId $id): bool;

}
