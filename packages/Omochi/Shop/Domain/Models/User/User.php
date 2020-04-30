<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-30
 * Time: 18:17
 */

namespace Omochi\Shop\Domain\Models\User;


/**
 * Class User
 * @package Omochi\Shop\Domain\Models\User
 */
final class User
{
    /**
     * @var UserId
     */
    private $id;
    /**
     * @var UserName
     */
    private $name;
    /**
     * @var UserEmail
     */
    private $email;
    /**
     * @var UserPassword
     */
    private $password;
    /**
     * @var UserProfileImg
     */
    private $profileImgUrl;


    /**
     * User constructor.
     * @param UserId $id
     * @param UserName $name
     * @param UserEmail $email
     * @param UserPassword $password
     * @param UserProfileImg $profileImgUrl
     */
    public function __construct(
        UserId $id,
        UserName $name,
        UserEmail $email,
        UserPassword $password,
        UserProfileImg $profileImgUrl
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->profileImgUrl = $profileImgUrl;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return UserName
     */
    public function getName(): UserName
    {
        return $this->name;
    }

    /**
     * @return UserEmail
     */
    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    /**
     * @return UserPassword
     */
    public function getPassword(): UserPassword
    {
        return $this->password;
    }

    /**
     * @return UserProfileImg
     */
    public function getProfileImgUrl(): UserProfileImg
    {
        return $this->profileImgUrl;
    }

}
