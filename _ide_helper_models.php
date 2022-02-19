<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Contact
 *
 * @property integer $id
 * @property string $title
 * @property string $main_link
 * @property string $main_text
 * @property string $example
 * @property string $logo
 * @property string $color
 * @property string $background_color
 * @property Profile[] $profiles
 * @package App\Models
 * @mixin Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $sort
 * @property-read int|null $profiles_count
 * @method static \Database\Factories\ContactFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Query\Builder|Contact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereBackgroundColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereExample($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMainLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMainText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Contact withoutTrashed()
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContactProfile
 *
 * @property int $contact_id
 * @property int $profile_id
 * @property string|null $link
 * @property string|null $text
 * @property string|null $slug
 * @property int $order_button
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $background_color
 * @property string|null $color
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereBackgroundColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereOrderButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactProfile whereUpdatedAt($value)
 */
	class ContactProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Profile
 *
 * @property string $name
 * @property integer $user_id
 * @property string $description
 * @property string $user_img
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 * @property User $user
 * @property Contact[] $contacts
 * @mixin Eloquent
 * @package App\Models
 * @property int $id
 * @property-read int|null $contacts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Query\Builder|Profile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserImg($value)
 * @method static \Illuminate\Database\Query\Builder|Profile withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Profile withoutTrashed()
 */
	class Profile extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $hash
 * @property integer $status
 * @property integer $role
 * @property integer $remember_token
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 * @property integer $isAdmin
 * @property Profile $profile
 * @package App\Models
 * @mixin Eloquent
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property int $type
 * @property string|null $comment
 * @property-read bool $is_admin
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

