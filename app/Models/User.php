<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @property  integer $id
 * @property  string $username
 * @property  string $password
 * @property  string $email
 * @property  string $hash
 * @property  integer $status
 * @property  integer $role
 * @property  integer $remember_token
 * @property  integer $created_at
 * @property  integer $updated_at
 * @property  integer $deleted_at
 * @property  integer $isAdmin
 *
 * @property  Profile $profile
 * @package App\Models
 * @mixin Eloquent
 *
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     *  Users roles
     */
    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;


    /**
     *  Users types
     */
    const TYPE_NULL = 0;
    const TYPE_CARD = 1;
    const TYPE_CHIP = 2;
    const TYPE_ALL = 3;

    /**
     * Users statuses
     */
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_MIDLE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'hash',
        'username',
        'role',
        'status',
        'type',
        'comment'
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
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
//    public $timestamps = false;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
//    protected $dateFormat = 'U';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    /**
     * Check admin role
     *
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        return static::ROLE_ADMIN == $this->role;
    }

    /**
     * Get user roles
     *
     * @return array
     */
    public static function getUserRoles()
    {
        return [
            User::ROLE_ADMIN => '??????????',
            User::ROLE_USER => '????????',
        ];
    }

    /**
     * Get user statuses
     *
     * @return array
     */
    public static function getUserStatuses()
    {
        return [
            User::STATUS_INACTIVE => '??????????????',
            User::STATUS_ACTIVE => '????????????????',
            User::STATUS_MIDLE => '??????????????'
        ];
    }

    //     /**
    //  * Get user types
    //  *
    //  * @return array
    //  */
    // public static function getUserTypes()
    // {
    //     return [
    //         User::TYPE_NULL => 'O',
    //         User::TYPE_CARD => '??????????',
    //         User::TYPE_CHIP => '??????',
    //         User::TYPE_ALL => '??????',
    //     ];
    // }

    /**
     * Find user by hash
     * @param string $hash
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|User
     */

    public static function findByHash($hash) {
        return User::select()->where(['hash' => $hash])->first();
    }

    /**
     * Find user by username
     *
     * @param string $username
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|User
     */
    public static function findByUsername($username) {
        return User::select()->where(['username' => $username])->first();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


}
