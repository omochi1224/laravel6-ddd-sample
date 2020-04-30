<?php
/**
 * Created by PhpStorm.
 * User: tsuyoshi
 * Date: 2020-04-30
 * Time: 18:10
 */

namespace Omochi\Shop\Domain\Infrastructure\Eloquents;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Omochi\Shop\Domain\Models\Domainable;
use Omochi\Shop\Domain\Models\User\User;
use Omochi\Shop\Domain\Models\User\UserEmail;
use Omochi\Shop\Domain\Models\User\UserId;
use Omochi\Shop\Domain\Models\User\UserName;
use Omochi\Shop\Domain\Models\User\UserPassword;
use Omochi\Shop\Domain\Models\User\UserProfileImg;


/**
 * Class EloquentUser
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string profileImg
 * @package Omochi\Shop\Domain\Infrastructure\Eloquents
 */
class EloquentUser extends Authenticatable implements Domainable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return mixed|User
     */
    public function toDomain()
    {
        return new User(
            UserId::of($this->id),
            UserName::of($this->name),
            UserEmail::of($this->email),
            UserPassword::of($this->password),
            UserProfileImg::of($this->profileImg)
        );
    }
}
