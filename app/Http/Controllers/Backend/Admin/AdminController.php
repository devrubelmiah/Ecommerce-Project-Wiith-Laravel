<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }
    
    public function index(){
        return view('backend.admin.index');
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    
}
