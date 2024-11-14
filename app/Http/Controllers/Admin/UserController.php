<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request){
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso');
    }

    public function edit(string $id){
        // $user = User::where('id', '=', $id)->first();
        // $user = User::where('id', $id)->first();
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id){
        if (!$user = User::find($id)) {
            return redirect()->back()->with('message', 'Usuário não encontrado');
        }

        $user->update($request->only([
            'name',
            'email'
        ]));

        return redirect()->route('users.index')->with('success', 'Usuário editado com sucesso');
    }
}
