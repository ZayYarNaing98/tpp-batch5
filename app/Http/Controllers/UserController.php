<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userRepository;
    protected $roleRepository;
    protected $userService;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository, UserService $userService)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userRepository->index();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleRepository->index();

        return view('users.create', [
            "roles" => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();

        $user = $this->userRepository->store([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);

        $user->roles()->sync($validatedData['roles']);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd($this->username());
        $roles = $this->roleRepository->index();

        $user = $this->userRepository->show($id);
        // $user = User::with('roles')->where('id', $id)->value();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $user = $this->userRepository->update($validatedData, $id);

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userRepository->destroy($id);

        return redirect()->route('users.index');
    }

    public function status($id)
    {
        $this->userService->status($id);

        return redirect()->route('users.index');
    }
}
