<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactProfile extends Model
{
    use HasFactory;

    protected $table = 'contact_profile';

    protected $fillable = [
        'contact_id',
        'profile_id',
        'link',
        'text',
        'slug',
        'order_button',
    ];
}
