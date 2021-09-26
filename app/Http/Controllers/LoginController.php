<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Spatie\TestTime\TestTime;
use Illuminate\Http\Request;
use App\Models\Posyandu;
use App\Models\Jadwal;
use Auth;
class LoginController extends Controller
{
    public function login (Request $request){
        $validasi = $request->all();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        if(auth()->attempt(array('email' => $validasi['email'], 'password' => $validasi['password']))){
            if (auth()->user()->level == "admin") {
                return redirect()->route('get.admin')->with('admin', 'Selamat Datang Admin');
            }else{
                return redirect()->route('get.dashboard')->with('status', 'Berhasil Login, Selamat Datang');
            }
        }else{
        return redirect('/login')->with('status', 'Email & Password Salah!!');
        }
    }
    
    public function logout (Request $request){
        Auth::logout();
        return redirect('/');
    }
    public function homes()
    {
        $jadwal = Jadwal::all();
        $posyanduu = Posyandu::all();
        return view('index',compact('jadwal','posyanduu'));
    }
    public function home()
    {
        return view('login');
    }
    public function registrasi()
    {
        return view('registrasi');
    }
    public function store (Request $request){
      
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'confirm-password' => 'required|same:password',
            ]);
            $user = \App\Models\User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'level' => 'user',
                'remember_token' => Str::random(60),
            ]);
            return redirect('/registrasi')->with('status', 'Berhasil membuat akun');
    }

}
