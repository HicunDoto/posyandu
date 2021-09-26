<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';

use Spatie\TestTime\TestTime;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Dt_vaksin;
use App\Charts\UserChart;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balita = DB::table('balita')->join('users', 'users.id_user', '=', 'balita.id_user')->where('balita.id_user',auth()->user()->id_user)->select('balita.*')->first();
        //dd($balita);
        return view('dashboard.index',['balita' => $balita]);
    }
    public function laporan()
    {
        \Carbon\Carbon::setLocale('id');
        $load = DB::table('penimbangan')->join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->where('balita.id_user',auth()->user()->id_user)->select('balita.*','penimbangan.*')->first();
        $penimbangan = DB::table('penimbangan')->join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->where('balita.id_user',auth()->user()->id_user)->select('balita.*','penimbangan.*')->get();

        $user2 = DB::table('penimbangan')->join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->select('balita.nama')->where('balita.id_user',auth()->user()->id_user)->groupBy('penimbangan.tgl_timbang')->get();
        $user1 = DB::table('penimbangan')->join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->select('penimbangan.bb')->where('balita.id_user',auth()->user()->id_user)->groupBy(DB::raw('penimbangan.tgl_timbang'))->get();
        $user3 = DB::table('penimbangan')->join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->select('penimbangan.tb')->where('balita.id_user',auth()->user()->id_user)->groupBy(DB::raw('penimbangan.tgl_timbang'))->get();
        $labels= $user2->flatten(1)->pluck('nama');
        $data=  $user1->flatten(1)->pluck('bb');
        $data1=  $user3->flatten(1)->pluck('tb');
        $bulan2=  $penimbangan->flatten(1)->pluck('tgl_timbang');
        // $data1= $user1->pluck('tb')->toArray();
        // for ($i=0; $i < count($data); $i++) { 
        //     $c[$i] = $data[$i].'.'.$data1[$i]; // gabungkan masing" isi array dg (,)
        //   }
        // $r = array_combine($data,$c);
        // $colors = $labels->map(function($item) {
        //         return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        //         });
        //dd($penimbangan);
        // $usersChart = new UserChart;
        // $usersChart->labels($labels);
        // $usersChart->dataset('Data', 'polarArea', $data)->backgroundColor($colors);
        return view('dashboard.laporan',compact('penimbangan','load','data','data1','labels','bulan2'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vaksinasi()
    {
        //$dtvaksin = DB::table('dt_vaksin')->join('balita', 'balita.id_balita', '=', 'dt_vaksin.id_balita')->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'dt_vaksin.id_vaksin')->where('balita.id_user',auth()->user()->id_user)->select('balita.*','vaksinasi.*','dt_vaksin.*')->get();
        $dtvaksin = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'pelayanan.id_vaksin')->where('balita.id_user',auth()->user()->id_user)->select('balita.*','vaksinasi.*','pelayanan.*')->get();
        $jadwal = DB::table('vaksinasi')->join('jadwal','jadwal.id_jadwal', '=', 'vaksinasi.id_jadwal')->join('balita', 'balita.id_balita', '=', 'vaksinasi.id_balita')->where('balita.id_user',auth()->user()->id_user)->select('balita.*','vaksinasi.*','jadwal.*')
        ->orderBy('tgl_kegiatan')
        ->groupBy('tgl_kegiatan')->get();
        //$dtvaksin1 = DB::table('dt_vaksin')->join('balita', 'balita.id_balita', '=', 'dt_vaksin.id_balita')->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'dt_vaksin.id_vaksin')->where('balita.id_user',auth()->user()->id_user)->select('balita.*','vaksinasi.*','dt_vaksin.*')->first();
        //dd($dtvaksin1);
        return view('dashboard.vaksinasi',compact('dtvaksin','jadwal'));
    }
    public function imunisasi()
    {
        $dtimun = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('imunisasi', 'imunisasi.id_imun', '=', 'pelayanan.id_imun')->where('balita.id_user',auth()->user()->id_user)->select('balita.*','imunisasi.*','pelayanan.*')->get();
        $jadwal = DB::table('imunisasi')->join('jadwal','jadwal.id_jadwal', '=', 'imunisasi.id_jadwal')->join('balita', 'balita.id_balita', '=', 'imunisasi.id_balita')->where('balita.id_user',auth()->user()->id_user)->select('balita.*','imunisasi.*','jadwal.*')
        ->orderBy('tgl_kegiatan')
        ->groupBy('tgl_kegiatan')->get();
        //$dtimun1 = DB::table('imunisasi')->join('balita', 'balita.id_balita', '=', 'imunisasi.id_balita')->where('balita.id_user',auth()->user()->id_user)->select('balita.*','imunisasi.*')->get();
        //dd($dtvaksin);
        return view('dashboard.imunisasi',compact('dtimun','jadwal'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $penimbangan = DB::table('penimbangan')->join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->where('balita.id_user',auth()->user()->id_user)->where('penimbangan.id_penimbangan',$id)->select('balita.*','penimbangan.*')->get();
        return view('dashboard.show',['penimbangan' => $penimbangan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
