<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('users.title.index');
        return view('users.index', [
            'title' => $title,
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('users.title.create');
        return view('users.create', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:30',
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'password' => 'required|min:8|confirmed',
                'avatar' => 'required|string|max:150'
            ],
            [],
            $this->attributes()
        );

        if ($validator->fails()) {
            $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'avatar' => parse_url($request->avatar)['path'],
            ]);
            $user->assignRole($request->role);

            Alert::toast(
                __('users.alert.create.message.success'),
                'success'
            );

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast(
                __('users.alert.create.message.error', ['error' => $th->getMessage()]),
                'errors'
            );

            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = __('users.title.edit');
        return view('users.edit', [
            'title' => $title,
            'user' => $user,
            'roleSelected' => $user->roles()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:30',
                'email' => 'required|email|exists:users,email',
                'role' => 'required',
                'avatar' => 'required|string|max:150'
            ],
            [],
            $this->attributes()
        );

        if ($validator->fails()) {
            $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'avatar' => parse_url($request->avatar)['path'],
            ]);
            $user->syncRoles($request->role);

            Alert::toast(
                __('users.alert.update.message.success'),
                'success'
            );

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast(
                __('users.alert.update.message.error', ['error' => $th->getMessage()]),
                'errors'
            );

            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    private function attributes()
    {
        return [
            'name' => __('users.attributes.name'),
            'email' => __('users.attributes.email'),
            'role' => __('users.attributes.role'),
            'password' => __('users.attributes.password'),
            'avatar' => __('users.attributes.avatar'),
        ];
    }
}
