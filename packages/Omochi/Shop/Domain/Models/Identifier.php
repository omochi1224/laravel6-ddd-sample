<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-28
 * Time: 01:16
 */

declare(strict_types=1);

namespace Omochi\Shop\Domain\Models;

/**
 * Class Identifier
 * @package Omochi\Shop\Domain\Models
 */
abstract class Identifier implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $value;

    /**
     * Identifier constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @param string $value
     * @return Identifier
     */
    public static function of(string $value): self
    {
        return new static($value);
    }

    /**
     * @return int
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * @param self $id
     * @return bool
     */
    public function equals(self $id): bool
    {
        return $this->value === $id->value;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->value;
    }
}
