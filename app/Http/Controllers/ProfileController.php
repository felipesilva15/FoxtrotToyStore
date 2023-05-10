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
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),

        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    public function updateUser(Request $request)
    {
    $request->validate([
        'USUARIO_NOME' => 'required|string|max:255',
        'usuario_email' => 'required|string|email|max:255|unique:USUARIO,USUARIO_EMAIL,' . Auth::user()->USUARIO_ID . ',USUARIO_ID',
        'usuario_senha' => 'required|string|min:8',
        'USUARIO_CPF' => 'nullable|string|max:14'
    ]);
    $user = $request->user();

    // lógica para atualizar os dados do usuário
    $user->update([
        'USUARIO_NOME' => $request->input('USUARIO_NOME'),
        'usuario_email' => $request->input('USUARIO_EMAIL'),
        'USUARIO_SENHA' => bcrypt($request->input('USUARIO_SENHA')),
        'USUARIO_CPF' => $request->input('USUARIO_CPF')
    ]);

    return redirect()->back()->with('success', 'Dados do usuário atualizados com sucesso.');
    }

    /**
     * Delete the user's account.
     */
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
