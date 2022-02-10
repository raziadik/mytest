<?php

namespace App\Http\Controllers\Cutaway;

use App\Http\Requests\UserProfileCreateRequest;
use App\Models\Contact;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class QrCodeController extends BaseController
{

    public function show() {
            return view('qr');
    }
}