<?php
namespace App\Http\Controllers\Backend\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.users.index');
    }

    public function logout()
    {
         Auth::logout();
         return redirect('/');

    }

}
