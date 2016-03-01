<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    public function getEdit()
    {
        $user = Auth::user();

        return view('user.profile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()) {
            return redirect('/user/edit')->withErrors($validate)->withInput($request->all());
        }

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        Flash::success('Usuário Editado com sucesso!!');
        return redirect('/');
    }
}