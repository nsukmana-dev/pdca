<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function _constract()
    {
        # code...
    }
    public function index(Request $request)
    {
        // dd($request->cookie('dep'));
        return view('dash');
    }
}