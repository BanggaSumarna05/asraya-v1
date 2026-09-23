<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    private $name = 'Users';

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('user/index', [
            'users' => User::when($request->search, function ($query, $q) {
                $query->where('name', 'like', '%' . $q . '%')
                      ->orWhere('email', 'like', '%' . $q . '%');
            })
                ->orderByDesc('id')
                ->paginate(10)
                ->withQueryString(),
            'name' => $this->name,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('user/create', [
            'name' => $this->name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'name'                  => ['required', 'string', 'max:255'],
                'email'                 => ['required', 'email', 'unique:users,email', 'max:255'],
                'password'              => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);

            DB::commit();
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Inertia::render('user/show', [
            'name' => $this->name,
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return Inertia::render('user/edit', [
            'name' => $this->name,
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'name'  => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id],
            ];

            if ($request->filled('password')) {
                $rules['password'] = ['string', 'min:8', 'confirmed'];
            }

            $validated = $request->validate($rules);

            if (isset($validated['password'])) {
                $validated['password'] = bcrypt($validated['password']);
            }

            User::findOrFail($id)->update($validated);

            DB::commit();
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            User::findOrFail($id)->delete();
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Show login form.
     */
    public function getLogin()
    {
        return Inertia::render('Auth/UserLogin', [
            'canResetPassword' => Route::has('password.request'),
            'status'           => session('status'),
        ]);
    }

    /**
     * Handle login request.
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->route('login')
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Show registration form.
     */
    public function getRegister()
    {
        return Inertia::render('Auth/UserRegister');
    }

    /**
     * Handle registration request.
     */
    public function postRegister(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'name'     => ['required', 'string', 'max:255'],
                'email'    => ['required', 'email', 'unique:users,email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);

            DB::commit();
            return redirect('/');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
