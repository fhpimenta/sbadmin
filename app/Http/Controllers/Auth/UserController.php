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

    public function getPasswordForm()
    {
        return view('user.resetpassword');
    }

    public function resetPassword(Request $request)
    {
        $rules = [
            'old_password' => 'required|min:6',
            'password' => 'required|confirmed|min:6'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()) {
            return redirect('/user/password/change')->withErrors($validate)->withInput($request->all());
        }

        $user = Auth::user();

        if(Hash::check($request->input('old_password'), $user->password)) {
            if($request->input('password') == $request->input('password_cofirmation')) {
                $user->password = bcrypt($request->input('password'));
                $user->save();
                Flash::success('Senha alterada com sucesso');
                return redirect('/');
            }else {
                Flash::warning('Nova senha não confirmada');
                return redirect()->back();
            }
        }

        Flash::warning('Senha atual está errada');
        return redirect()->back();
    }
}