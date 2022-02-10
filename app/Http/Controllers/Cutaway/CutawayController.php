<?php

namespace App\Http\Controllers\Cutaway;

use App\Http\Requests\UserProfileCreateRequest;
use App\Models\Contact;
use App\Models\Profile;
use App\Models\ContactProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CutawayController extends BaseController
{
    /**
     * Display user profile
     *
     * @param  Request  $request
     * @param  string  $link
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function show(Request $request, $link)
    {
        $user = User::findByUsername($link);
        if ($user) {
            $canEdit = Gate::allows('edit_profile', $user->profile);
            return view('cutaway.show', compact('user', 'canEdit'));
        }
        $user = User::findByHash($link);
        if ($user->username) {
            return redirect('/' . $user->username);
        }
        if (Auth::check()) {
            return redirect('/' . Auth::user()->username);
        }
        if (!$user) {
            abort(404);
        }
        return view('auth.register')->with('hash', $user->hash);
    }

    public function edit($profileId)
    {
        $profile = Profile::findOrFail($profileId);
        $contacts = Contact::all();
        if (!Gate::allows('edit_profile', $profile)) {
            abort(403);
        }
        return view('cutaway.edit', compact('profile', 'contacts'));
    }

    public function profile($profileId)
    {
        $profile = Profile::findOrFail($profileId);

        if (!Gate::allows('edit_profile', $profile)) {
            abort(403);
        }
        return view('cutaway.profile', compact('profile'));
    }

    public function save(UserProfileCreateRequest $request, $profileId)
    {
        $profile = Profile::findOrFail($profileId);
        if (!Gate::allows('edit_profile', $profile)) {
            abort(403);
        }
        $data = $request->all();
        if ($request->file('user_img')) {
            $data['user_img'] = $request->file('user_img')->store('user_img');
        }
        $result = $profile->update($data);
        $profile->user->fill(['username' => $data['username']]);
        $profile->user->save();
        if ($result) {
            return redirect()
                ->route('edit', $profile->id);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function uploadAvatar(Request $request, $profileId)
    {
        $profile = Profile::findOrFail($profileId);
        if (!Gate::allows('edit_profile', $profile)) {
            abort(403);
        }
		$data=[];
        if ($request->file('avatar')) {
            $data['user_img'] = $request->file('avatar')->store('user_img');
        }
		\Storage::disk('user_img')->delete(str_replace('user_img','',$profile->user_img));
        $result = $profile->update($data);
        $profile->user->save();
        if ($result) {
            return redirect()
                ->route('edit', $profile->id);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function contacts(Request $request, $profileId)
    {
        $contacts = $request->post();
        $data = [];
        $profileId = $contacts[0]['profile_id'];
        foreach ($contacts as $key => $contact) {
            $data[$key]['contact_id'] = $contact['contact_id'];
            $data[$key]['profile_id'] = $contact['profile_id'];
            $data[$key]['order_button'] = $key;
            $data[$key]['link'] = $contact['link'];
            $data[$key]['text'] = $contact['text'];
            $data[$key]['slug'] = $contact['slug'];

            $contact_profile = \DB::table('contact_profile')->where(['profile_id' => $contact['profile_id'], 'slug' => $contact['slug']])->update(['order_button'=>$key]);
        }
        return response()->json($data);
    }

    public function addContact(Request $request, $profileId, $contactId)
    {
        $profile = Profile::find($profileId);
        if (!Gate::allows('edit_profile', $profile)) {
            abort(403);
        }

        $order = \DB::table('contact_profile')->where('profile_id',$profileId)->max('order_button');

        if($order === 0) {
            $order_button = 1;
        } elseif(empty($order)) {
            $order_button = 0;
        } else {
            $order_button = $order + 1;
        }

        $data = [
            'profile_id' => $profileId,
            'contact_id' => $contactId,
            'order_button' => $order_button,
            'slug' => time(),
        ];

        $result = \DB::table('contact_profile')->insert($data);
        if ($result) {
            return \Redirect::route('edit.edit-contact', ['profileId'=>$profileId,'contactId'=>$data['slug']]);
        }
        else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function editContact(Request $request, $profileId, $contactId)
    {
        $profile = Profile::find($profileId);
        if (!Gate::allows('edit_profile', $profile)) {
            abort(403);
        }
//        $contact = \DB::table('contact_profile')->where(['profile_id' => $profileId, 'slug' => $contactId])->first();
        $contact = ContactProfile::where('profile_id',$profileId)->where('slug',$contactId)->first();

        $contactOrigin = Contact::where('id', $contact->contact_id)->first();
        return view('cutaway.edit-contact', compact('profile', 'contact', 'contactOrigin'));
    }

//    public function getContact($profileId, $contactId, $attempts = 1) {
//        $contact = \DB::table('contact_profile')->where(['profile_id' => $profileId, 'slug' => $contactId])->first();
//        if(!empty($contact)) {
//            \Log::debug('Попыток запроса: ' . $attempts);
//            return $contact;
//        } else {
//            $attempts++;
//            return $this->getContact($profileId, $contactId, $attempts);
//        }
//    }

    public function saveContact(Request $request, $profileId, $id)
    {
        $data = [
            'link' => $request->post('link'),
            'text' => $request->post('text'),
        ];
        $result = \DB::table('contact_profile')->where(['profile_id' => $profileId, 'slug' => $id])->update($data);
        $profile = Profile::find($profileId);
        return redirect()->route('edit', $profileId);
    }

    public function deleteContact(Request $request, $profileId, $id)
    {
        $result = \DB::table('contact_profile')->where(['profile_id' => $profileId, 'slug' => $id])->delete();
        $profile = Profile::find($profileId);
        return redirect()->route('edit', $profileId);
    }
}
