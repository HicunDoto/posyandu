<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';

use Spatie\TestTime\TestTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\UserChart;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soal = DB::table('soals')->join('flag', 'flag.id_soal', '=', 'soals.id_soal')->select('soals.*', 'flag.flag')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.index',compact('soal'));
    }
    public function show_timbang()
    {
        $soal = DB::table('soals')->join('flag', 'flag.id_soal', '=', 'soals.id_soal')->select('soals.*', 'flag.flag')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.timbang',compact('soal'));
    }
    public function show_create_timbang()
    {
        $soal = DB::table('soals')->join('flag', 'flag.id_soal', '=', 'soals.id_soal')->select('soals.*', 'flag.flag')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.input-timbang',compact('soal'));
    }
    public function create_timbang()
    {
        $soal = DB::table('soals')->join('flag', 'flag.id_soal', '=', 'soals.id_soal')->select('soals.*', 'flag.flag')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.timbang',compact('soal'));
    }
    public function show_pelayanan()
    {
        $soal = DB::table('soals')->join('flag', 'flag.id_soal', '=', 'soals.id_soal')->select('soals.*', 'flag.flag')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.pelayanan',compact('soal'));
    }
    public function show_create_pelayanan()
    {
        $soal = DB::table('soals')->join('flag', 'flag.id_soal', '=', 'soals.id_soal')->select('soals.*', 'flag.flag')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.input-pelayanan',compact('soal'));
    }
    public function create_pelayanan()
    {
        $soal = DB::table('soals')->join('flag', 'flag.id_soal', '=', 'soals.id_soal')->select('soals.*', 'flag.flag')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.timbang',compact('soal'));
    }
    public function show_laporan()
    {
        $soal = DB::table('soals')->join('flag', 'flag.id_soal', '=', 'soals.id_soal')->select('soals.*', 'flag.flag')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.laporan',compact('soal'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.input-soal',[
            'soal' => \App\Models\Soal::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
        'nama_soal' => 'required|max:20',
        'keterangan' => 'required|max:255',
        'kategori' => 'required',
        'clue' => 'required',
        'nilai' => 'required',
        'aktif_soal' => 'required',
        'waktu' => 'required',
        ]);
        $soal= \App\Models\Soal::create([
            'nama_soal' => $request->nama_soal,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'clue' => $request->clue,
            'nilai' => $request->nilai,
            'aktif_soal' => $request->aktif_soal,
            'waktu' => $request->waktu,
        ]);
        //dd($soal);
        $id = $soal->id;
        return redirect()->to('/admin/input-flag/'.$id)->with('status', 'Soal berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $soal = \App\Models\Soal::where('id_soal',$id)->firstOrFail();
        $flag = \App\Models\Flag::where('id_soal',$id)->firstOrFail();
         //dd($soal);
        return view('admin.detail-soal',['soal' => $soal,'flag' => $flag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soal = \App\Models\Soal::where('id_soal',$id)->firstOrFail();
        $flag = \App\Models\Flag::where('id_soal',$id)->firstOrFail();
        return view('admin.edit',[
        'soal' => $soal,
        'flag' => $flag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_soal' => 'required|max:20',
            'keterangan' => 'required|max:255',
            'kategori' => 'required',
            'clue' => 'required',
            'nilai' => 'required',
            'aktif_soal' => 'required',
            'flag' => 'required|max:50',
            'waktu' => 'required',
            'edukasi' => 'required',
        ]);
        $soal = \App\Models\Soal::where('id_soal',$id)
                                ->update([
                                    'nama_soal' => $request->nama_soal,
                                    'keterangan' => $request->keterangan,
                                    'kategori' => $request->kategori,
                                    'clue' => $request->clue,
                                    'nilai' => $request->nilai,
                                    'aktif_soal' => $request->aktif_soal,
                                    'waktu' => $request->waktu,
                                ]);
        $flag = \App\Models\Flag::where('id_soal',$id)
        ->update([
            'flag' => $request->flag,
            'edukasi' => $request->edukasi,
        ]);
       // dd($soal);
       // dd($flag);
    return redirect('/admin')->with('status', 'Soal berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $soal = \App\Models\Soal::where('id_soal',$id)->delete();
        $flag = \App\Models\Flag::where('id_soal',$id)->delete();
        $status = \App\Models\Status::where('id_soal',$id)->delete();
        return redirect('/admin')->with('status', 'Soal berhasil dihapus!');
    }

    public function createflag($id)
    {
        $soal = \App\Models\Soal::where('id_soal',$id)->firstOrFail();
        return view('admin.input-flag',[
            'flag' => \App\Models\Flag::all(),
            'soal' => $soal,
            ]);
    }

    public function flag(Request $request)
    {
        $request->validate([
        'flag' => 'required|max:155',
        'edukasi' => 'required|max:155',
        ]);
        \App\Models\Flag::create($request->all());
        return redirect('/admin')->with('status', 'Flag berhasil ditambahkan!');
    }

    public function player()
    {
        $var = 'user';
        $var1 = 'benar';
        $user = DB::table('status')->join('users', 'users.id_user', '=', 'status.id_user')->join('soals', 'soals.id_soal', '=', 'status.id_soal')->select('users.name','users.email',DB::raw('SUM(soals.nilai) as jumlah'),'status.*')->where('status.status','LIKE',"%{$var1}%")->where('users.level','LIKE',"%{$var}%")->groupBy('status.id_user')->orderBy('jumlah','desc')->orderBy('users.name','asc')->get();
        $user1 = DB::table('status')->join('users', 'users.id_user', '=', 'status.id_user')->join('soals', 'soals.id_soal', '=', 'status.id_soal')->select(DB::raw('SUM(soals.nilai) as jumlah'))->where('status.status','LIKE',"%{$var1}%")->where('users.level','LIKE',"%{$var}%")->groupBy('status.id_user')->get();
        $user2 = DB::table('status')->join('users', 'users.id_user', '=', 'status.id_user')->join('soals', 'soals.id_soal', '=', 'status.id_soal')->select('users.name')->where('status.status','LIKE',"%{$var1}%")->where('users.level','LIKE',"%{$var}%")->groupBy('status.id_user')->get();
        //$user = \App\Models\User::where('level','LIKE',"%{$var}%")->get();
        // $soal = DB::table('soal')->get();
        //dd($user1);
        
        
        $labels= $user2->flatten(1)->pluck('name');
        $data= $user1->flatten(1)->pluck('jumlah');
        $colors = $labels->map(function($item) {
                return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
                });
        //dd($usersChart);
        $usersChart = new UserChart;
        $usersChart->labels($labels);
        $usersChart->dataset('Scoreboard', 'polarArea', $data)->backgroundColor($colors);
        return view('admin.player',[
            'user' => $user,
            'usersChart' => $usersChart,
            ]);
    }
}
