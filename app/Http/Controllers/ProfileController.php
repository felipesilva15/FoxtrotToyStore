<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Address;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();
        $address = $user->address;

        return view('profile.edit', compact('user', 'address'));
    }

    public function updateUser(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->update($request->validated());

        return redirect()->back()->with('success', 'Dados do usuário atualizados com sucesso.');
    }

    public function updateAddress(Request $request): RedirectResponse
    {
        $request->validate([
            'ENDERECO_CEP' => 'required|string|max:8',
            'ENDERECO_NOME' => 'required|string',
            'ENDERECO_LOGRADOURO' => 'required|string',
            'ENDERECO_NUMERO' => 'required|string',
            'ENDERECO_COMPLEMENTO' => 'nullable|string',
            'ENDERECO_CIDADE' => 'required|string',
            'ENDERECO_ESTADO' => 'required|string',
        ]);

        $user = $request->user();
        $address = $user->address;

        if ($address) {
            $address->update($request->validated());
        } else {
            $user->address()->create($request->validated());
        }

        return redirect()->back()->with('success', 'Dados do endereço atualizados com sucesso.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
