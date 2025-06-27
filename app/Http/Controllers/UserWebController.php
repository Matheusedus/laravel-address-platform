<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;

class UserWebController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->listPaginated();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            $this->userService->create($request->all());
            return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Exception $e) {
            // Em caso de erro, retorna a mensagem
            return back()
                ->withInput()
                ->withErrors(['cep' => $e->getMessage()]);
        }
    }
}
