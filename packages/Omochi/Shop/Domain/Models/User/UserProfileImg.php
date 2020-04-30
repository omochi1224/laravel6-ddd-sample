<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-30
 * Time: 18:21
 */

namespace Omochi\Shop\Domain\Models\User;


class UserProfileImg
{
    /**
     * @var string
     */
    private $url;

    /**
     * ItemName constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param string $url
     * @return UserProfileImg
     */
    public static function of(string $url): self
    {
        return new static($url);
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->url;
    }
}
