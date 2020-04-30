<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-28
 * Time: 01:06
 */

declare(strict_types=1);

namespace Omochi\Shop\Domain\Models;

/**
 * Class PositiveNumber
 * @package Omochi\Shop\Domain\Models
 */
abstract class PositiveNumber implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $value;

    /**
     * PositiveNumber constructor.
     * @param int $value
     * @throws InvariantException
     */
    public function __construct(int $value = 0)
    {

        if ($value < 0) {
            throw new InvariantException('value must be positive number:' . $value);
        }
        $this->value = $value;
    }

    /**
     * @param int $value
     * @return PositiveNumber
     * @throws InvariantException
     */
    public static function of(int $value = 0): self
    {
        return new static($value);
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
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
