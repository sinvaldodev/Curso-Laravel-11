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
}
