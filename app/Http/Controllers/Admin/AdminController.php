<?php


namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminController extends BaseController
{
    use AuthenticatesUsers;

    protected $redirectTo = 'admin/dashboard';

    /**
     * Main admin page
     */
    public function dashboard()

    {
        if (! Gate::allows('all_manage')) {
            return abort(401);
        }
        $statistics = DB::table('users')
            ->select('created_at', DB::raw("count(*) as cou"))
            ->where('status',1)
            ->groupBy('created_at')
            ->get();
//        dd($statistics);

//        $statistics = DB::table('users')
//            ->select(DB::raw('created_at, count(*) as cou'))
//            ->where('status',0)
//            ->groupBy('created_at')
//            ->get();
//        dd($statistics);

        $charts = [];
        foreach ($statistics as $statistic) {
            $charts[] = [
                "date"=> $statistic->created_at,
                "value"=> $statistic->cou
            ];
        }
        return view('admin.dashboard', ['charts' => json_encode($charts)]);
    }

    /**
     * @inheritDoc
     */
    public function username()
    {
        return 'username';
    }

    /**
     * @inheritDoc
     */
    public function showLoginForm()
    {
        if (Auth::user() && Auth::user()->hasAnyRole('administrator', 'moderator')) {
            return redirect($this->redirectTo);
        }
        return view('admin.login');
    }

}
