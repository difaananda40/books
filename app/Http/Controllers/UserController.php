<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }

    public function getData() {
        $user = $this->user->with('role')->get();
        return DataTables::of($user)->make(true);
    }

    public function index() {
        return view('user.index');
    }

    public function create() {
        return view('user.create');
    }

    public function store(UserRequest $request) {
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => bcrypt('user')
        ]);
        return redirect()->route('user.create')->with(['message' => "{$user->name} has created!"]);
    }

    public function edit($id) {
        $user = $this->user->findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, $id) {
        $user = $this->user->findOrFail($id);
        $user->update($request->all());
        return redirect()->route('user.index')->with(['message' => "{$user->name} has edited!"]);
    }

    public function destroy($id) {
        $user = $this->user->with('books')->findOrFail($id);
        if($user->books->count() > 0) {
            return redirect()->route('user.index')->with(['alert_type' => 'alert-danger', 'message' => "{$user->name} can't be delete, it has relations!"]);
        }
        else {
            $user->delete();
            return redirect()->route('user.index')->with(['message' => "{$user->name} has deleted!"]);    
        }
    }

    public function resetPassword($id) {
        $user = $this->user->findOrFail($id);
        $user->update([
            'password' => bcrypt('user')
        ]);
        return redirect()->route('user.edit', $id)->with(['message' => "{$user->name}'s password reseted!"]);
    }
}
