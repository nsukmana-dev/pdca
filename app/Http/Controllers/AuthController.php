<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\Division;
use App\Models\Departemen;
  
class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        // $password = Hash::make('admin123');
        // User::create([
        //     'nik' => '010710',
        //     'username' => 'michelle',
        //     'fullname' => 'Michelle Jessica',
        //     'email' => 'michelle.jessica@gs.astra.co.id',
        //     'password' => Hash::make('admin123'),
        //     'division' => 1,
        //     'departemen' => 1,
        //     'user_level' => 1,
        //     'is_actived' => 1
        // ]);
        return view('auth.login');
    }
  
    public function login(Request $request)
    {
        $rules = [
            'nik'                 => 'required',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'nik.required'        => 'NIK wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules);
        
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $password = Hash::make($request->input('password'));
  
        $data = [
            'nik'     => $request->input('nik'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            // $div = Division::get();
            // $dep = Departemen::get();
            // $div2 = Division::where('div_id', '=', Auth::user()->division)->get();
            // $dep2 = Departemen::where('dep_id', '=', Auth::user()->departemen)->get();
            // $dep = Departemen::get();
            // $divdep = array('divdep');
            // $arr1 = array();
            // $arr2 = array();
            // $arr3 = array();
            // $arr4 = array();
            // foreach ($div as $row){
            //     $arr1['id'] = $row['id'];
            //     $arr1['div_id'] = $row['div_id'];
            //     $arr1['div_name'] = $row['div_name'];
            //     $arr1['div_status'] = $row['div_status'];
            //     $arr1['div_kode'] = $row['div_kode'];
            //     $divdep['divdep']['alldiv'][] = $arr1;
            // }
            // foreach ($dep as $row){
            //     $arr2['id'] = $row['id'];
            //     $arr2['dep_id'] = $row['dep_id'];
            //     $arr2['dep_name'] = $row['dep_name'];
            //     $arr2['dep_status'] = $row['dep_status'];
            //     $arr2['plant_id'] = $row['plant_id'];
            //     $arr2['dep_head'] = $row['dep_head'];
            //     $arr2['dep_kode'] = $row['dep_kode'];
            //     $arr2['div_id'] = $row['div_id'];
            //     $divdep['divdep']['alldep'][] = $arr2;
            // }
            // foreach ($div2 as $row){
            //     $arr3['id'] = $row['id'];
            //     $arr3['div_id'] = $row['div_id'];
            //     $arr3['div_name'] = $row['div_name'];
            //     $arr3['div_status'] = $row['div_status'];
            //     $arr3['div_kode'] = $row['div_kode'];
            //     $divdep['divdep']['thisdiv'] = $arr3;
            // }
            // foreach ($dep2 as $row){
            //     $arr4['id'] = $row['id'];
            //     $arr4['dep_id'] = $row['dep_id'];
            //     $arr4['dep_name'] = $row['dep_name'];
            //     $arr4['dep_status'] = $row['dep_status'];
            //     $arr4['plant_id'] = $row['plant_id'];
            //     $arr4['dep_head'] = $row['dep_head'];
            //     $arr4['dep_kode'] = $row['dep_kode'];
            //     $arr4['div_id'] = $row['div_id'];
            //     $divdep['divdep']['thisdep'] = $arr4;
            // }
            // dd($divdep);
            return redirect()->route('home');
            // ->withCookie(cookie('divdep', $divdep, time()+86400));
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'NIK atau password salah');
            return redirect()->route('login');
        }
  
    }
  
    public function showFormRegister()
    {
        return view('register');
    }
  
    // public function register(Request $request)
    // {
    //     $rules = [
    //         'name'                  => 'required|min:3|max:35',
    //         'email'                 => 'required|email|unique:users,email',
    //         'password'              => 'required|confirmed'
    //     ];
  
    //     $messages = [
    //         'name.required'         => 'Nama Lengkap wajib diisi',
    //         'name.min'              => 'Nama lengkap minimal 3 karakter',
    //         'name.max'              => 'Nama lengkap maksimal 35 karakter',
    //         'email.required'        => 'Email wajib diisi',
    //         'email.email'           => 'Email tidak valid',
    //         'email.unique'          => 'Email sudah terdaftar',
    //         'password.required'     => 'Password wajib diisi',
    //         'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
    //     ];
  
    //     $validator = Validator::make($request->all(), $rules, $messages);
  
    //     if($validator->fails()){
    //         return redirect()->back()->withErrors($validator)->withInput($request->all);
    //     }
  
    //     $user = new User;
    //     $user->name = ucwords(strtolower($request->name));
    //     $user->email = strtolower($request->email);
    //     $user->password = Hash::make($request->password);
    //     $user->email_verified_at = \Carbon\Carbon::now();
    //     $simpan = $user->save();
  
    //     if($simpan){
    //         Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
    //         return redirect()->route('login');
    //     } else {
    //         Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
    //         return redirect()->route('register');
    //     }
    // }
  
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
  
  
}