<?php

namespace App\Models;

use App\Traits\BasicHasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class categories
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
class Category extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, BasicHasRoles;

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
            User::ROLE_ADMIN => 'Админ',
            User::ROLE_USER => 'Юзер',
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
            User::STATUS_INACTIVE => 'Неактив',
            User::STATUS_ACTIVE => 'Активный',
            User::STATUS_MIDLE => 'Прошита'
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
    //         User::TYPE_CARD => 'Карта',
    //         User::TYPE_CHIP => 'Чип',
    //         User::TYPE_ALL => 'Оба',
    //     ];
    // }



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

    /**
     * The profile attributes that belong to the category.
     */
    public function filterableAttributes(): BelongsToMany
    {
        return $this->belongsToMany( 'category_profile');
    }
}
