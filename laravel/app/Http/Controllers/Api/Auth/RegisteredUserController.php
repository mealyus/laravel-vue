<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return response()->json([
            'status' => 'Success',
            'user' => $user,
        ]);
    }

    public function getUser(Request $request, $id = null) {
        if($id) {
            $user = User::find($id);
        } else {
            $user = Auth::user();
        }
        return response()->json([
            'status' => 'Success',
            'user' => $user
        ]);
    }

    public function getUsersCount(Request $request)
    {
        $count = User::all()->count();
        return response()->json([
            'status' => 'Success',
            'count' => $count
        ]);
    }

    public function getUsers(Request $request)
    {
        return new UserCollection(User::latest()->paginate());
    }

    public function updateUser($id, Request $request) {
        if($request->password) {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
        }
        $user = User::find($id);
        $user->update($request->all());
        return response()->json([
            'status' => 'Success',
            'first_name' => $request->first_name,
            'id' => $id,
            'user' => $user,
            'request' => $request->all(),
            'newpassword' => $request->password,
        ]);
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => 'Success',
            'id' => $id
        ]);
    }
}
