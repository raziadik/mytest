<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserCreateRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Models\User;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $paginator = User::query();
        if ($q) {
            $paginator = $paginator
                ->where('username', 'like', '%' . $q . '%')
                ->orWhere('hash', 'like', '%' . $q . '%')
                ->orWhere('email', 'like', '%' . $q . '%')
                ->orWhere('comment', 'like', '%' . $q . '%')
                ->orWhere('role', 'like', '%' . $q . '%')
                ->orWhere('id', 'like', '%' . $q . '%');
        }
        $paginator = $paginator->paginate(11);
        $roles = User::getUserRoles();
        $statuses = User::getUserStatuses();
        return view('admin.users.index', compact('paginator', 'roles', 'statuses', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminUserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminUserCreateRequest $request)
    {
        $data = $request->input();
        $item = (new User())->create($data);

        if ($item) {
            return redirect()
                ->route('admin.users.show', $item->id)
                ->with(['success' => 'Пользователь добавлен']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $item = User::findOrFail($id);
        $roles = User::getUserRoles();
        $statuses = User::getUserStatuses();

        return view('admin.users.show', compact('item', 'roles', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        $roles = User::getUserRoles();
        $statuses = User::getUserStatuses();

        return view('admin.users.edit', compact('item', 'roles', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUserUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminUserUpdateRequest $request, $id)
    {
        $item = User::find($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id={$id} не найдена."])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return back()
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = User::destroy($id);
        if ($result) {
            return redirect()
                ->route('admin.users.index')
                ->with(['success' => "Пользователь с id[$id] удален"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления'])
                ->withInput();
        }
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
