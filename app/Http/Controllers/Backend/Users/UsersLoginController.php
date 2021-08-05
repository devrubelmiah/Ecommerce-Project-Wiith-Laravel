<?php
namespace App\Http\Controllers\Backend\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function usersLoginForm()
    {
        return view('auth.login');
    }

    public function usersLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended(route('index'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }

}
