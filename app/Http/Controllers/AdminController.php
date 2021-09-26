<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';

use Spatie\TestTime\TestTime;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\UserChart;
use App\Models\Dt_vaksin;
use App\Models\Dt_imunisasi;
use App\Models\Pelayanan;
use App\Models\Penimbangan;
use App\Models\Posyandu;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balita = DB::table('users')->join('balita', 'balita.id_user', '=', 'users.id_user')->select('users.email', 'balita.*')->get();
        $bidan = \App\Models\Bidan::all();
        $kader = \App\Models\Kader::all();
        $balita1 = DB::table('balita')->select(DB::raw('COUNT(*) as hasil'))->get();
        $bidan1 = DB::table('bidan')->select(DB::raw('COUNT(*) as hasil'))->get();
        $kader1 = DB::table('kader')->select(DB::raw('COUNT(*) as hasil'))->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.index',compact('balita','bidan','kader','balita1','bidan1','kader1'));
    }
    public function lihat_balita()
    {
        $balita = DB::table('users')->join('balita', 'balita.id_user', '=', 'users.id_user')->select('users.email', 'balita.*')->get();
        return view('admin.lihat-balita',compact('balita'));
    }
    public function detail_balita($id)
    {
        $balita = \App\Models\Balita::where('id_user',$id)->firstOrFail();
        $user = \App\Models\User::where('id_user',$id)->firstOrFail();
        return view('admin.balita',compact('balita','user'));
    }
    public function edit_detail_balita($id)
    {
        $balita = \App\Models\Balita::where('id_user',$id)->firstOrFail();
        $user = \App\Models\User::where('id_user',$id)->firstOrFail();
        return view('admin.edit-balita',compact('balita','user'));
    }
    public function delete_balita(Request $request,$id)
    {
        $balita = \App\Models\Balita::where('id_user',$id)->delete();
        $user = \App\Models\User::where('id_user',$id)->delete();
        return redirect('/admin')->with('status', 'Data diri balita berhasil dihapus!');
    }
    public function update_detail_balita(Request $request,$id)
    {
        $request->validate([
            'email' => 'required|email',
            'nama' => 'required|max:155',
            'tl' => 'required|max:155',
            'tgl' => 'required|max:155',
            'jenis' => 'required|max:155',
            'ayah' => 'required|max:155',
            'ibu' => 'required|max:155',
            'anakke' => 'required|max:155',
            'alamat' => 'required|max:155',
            ]);
            \App\Models\Balita::where('id_user', $id)->update([
                'nama' => $request->nama,
                'id_user' => $request->id_user,
                'tempat' => $request->tl,
                'tl' => $request->tgl,
                'jenis' => $request->jenis,
                'ayah' => $request->ayah,
                'ibu' => $request->ibu,
                'anakke' => $request->anakke,
                'alamat' => $request->alamat,
            ]);
            \App\Models\User::where('id_user', $id)->update([
                'email' => $request->email,
            ]);
            return redirect('/admin')->with('status', 'Data diri balita berhasil dirubah!');
    }
    public function show_bidan()
    {
        $bidan = \App\Models\Bidan::all();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.bidan',compact('bidan'));
    }
    public function show_create_bidan()
    {
        return view('admin.input-bidan');
    }
    public function edit_detail_bidan($id)
    {
        $bidan = \App\Models\Bidan::where('id_bidan',$id)->firstOrFail();
        return view('admin.edit-bidan',compact('bidan'));
    }
    public function show_detail_bidan(Request $request,$id)
    {
        $bidan = \App\Models\Bidan::where('id_bidan',$id)->firstOrFail();
        return view('admin.detail-bidan',compact('bidan'));
    }
    public function delete_detail_bidan(Request $request,$id)
    {
        $bidan = \App\Models\Bidan::where('id_bidan',$id)->delete();
        return redirect('/admin/bidan')->with('status', 'Data diri bidan berhasil dihapus!');
    }
    public function update_detail_bidan(Request $request,$id)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'tl' => 'required|max:155',
            'tgl' => 'required|max:155',
            'jenis' => 'required|max:155',
            'status' => 'required|max:155',
            'no_telp' => 'required|max:13',
            'alamat' => 'required|max:155',
            ]);
            \App\Models\Bidan::where('id_bidan', $id)->update([
                'nama_bidan' => $request->nama,
                'tempat' => $request->tl,
                'tl' => $request->tgl,
                'jenis' => $request->jenis,
                'status' => $request->status,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);
            return redirect('/admin/bidan')->with('status', 'Data diri bidan berhasil dirubah!');
    }
    public function create_bidan(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'tl' => 'required|max:155',
            'tgl' => 'required|max:155',
            'jenis' => 'required|max:155',
            'no_telp' => 'required|max:13',
            'alamat' => 'required|max:155',
            ]);
            \App\Models\Bidan::create([
                'nama_bidan' => $request->nama,
                'tempat' => $request->tl,
                'tl' => $request->tgl,
                'jenis' => $request->jenis,
                'status' => 'aktif',
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);
            return redirect('/admin/bidan')->with('status', 'Data diri bidan berhasil ditambahkan!');
    }
    public function show_kader()
    {
        $kader = \App\Models\Kader::all();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.kader',compact('kader'));
    }
    public function edit_detail_kader($id)
    {
        $kader = \App\Models\Kader::where('id_kader',$id)->firstOrFail();
        return view('admin.edit-kader',compact('kader'));
    }
    public function show_detail_kader(Request $request,$id)
    {
        $kader = \App\Models\Kader::where('id_kader',$id)->firstOrFail();
        return view('admin.detail-kader',compact('kader'));
    }
    public function delete_detail_kader(Request $request,$id)
    {
        $kader = \App\Models\Kader::where('id_kader',$id)->delete();
        return redirect('/admin/kader')->with('status', 'Data diri kader berhasil dihapus!');
    }
    public function update_detail_kader(Request $request,$id)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'tempat' => 'required|max:155',
            'tl' => 'required|max:155',
            'tgl' => 'required|max:155',
            'jenis' => 'required|max:155',
            'jabatan' => 'required|max:155',
            'no_telp' => 'required|max:13',
            'alamat' => 'required|max:155',
            ]);
            \App\Models\Kader::where('id_kader', $id)->update([
                'nama_kader' => $request->nama,
                'tempat' => $request->tempat,
                'tempatl' => $request->tl,
                'tl' => $request->tgl,
                'jenis' => $request->jenis,
                'jabatan' => $request->jabatan,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);
            return redirect('/admin/kader')->with('status', 'Data diri kader berhasil dirubah!');
    }
    public function show_create_kader()
    {
        return view('admin.input-kader');
    }
    public function create_kader(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'tempat' => 'required|max:155',
            'tl' => 'required|max:155',
            'tgl' => 'required|max:155',
            'jenis' => 'required|max:155',
            'jabatan' => 'required|max:155',
            'no_telp' => 'required|max:13',
            'alamat' => 'required|max:155',
            ]);
            \App\Models\Kader::create([
                'nama_kader' => $request->nama,
                'tempat' => $request->tempat,
                'tempatl' => $request->tl,
                'tl' => $request->tgl,
                'jenis' => $request->jenis,
                'jabatan' => $request->jabatan,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);
            return redirect('/admin/kader')->with('status', 'Data diri kader berhasil ditambahkan!');
    }
    public function show_create_balita($id)
    {
        $user = \App\Models\User::where('id_user',$id)->firstOrFail();
        return view('admin.input-balita',[
            'balita' => \App\Models\Balita::all(),
            'user' => $user,
            ]);
    }
    public function create_balita(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:155',
            'tl' => 'required|max:155',
            'tgl' => 'required|max:155',
            'jenis' => 'required|max:155',
            'ayah' => 'required|max:155',
            'ibu' => 'required|max:155',
            'anakke' => 'required|max:155',
            'alamat' => 'required|max:155',
            ]);
            \App\Models\Balita::create([
                'nama' => $request->nama,
                'id_user' => $request->id_user,
                'tempat' => $request->tl,
                'tl' => $request->tgl,
                'jenis' => $request->jenis,
                'ayah' => $request->ayah,
                'ibu' => $request->ibu,
                'anakke' => $request->anakke,
                'alamat' => $request->alamat,
            ]);
            return redirect('/admin')->with('status', 'Data diri balita berhasil ditambahkan!');
    }
    public function show_create_akun()
    {
        return view('admin.input-akun');
    }
    public function create_akun(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
            'u_password' => 'required|same:password',
            ]);
            $user = \App\Models\User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'level' => 'user',
                'remember_token' => Str::random(60),
            ]);
            $id = $user->id_user;
            //dd($id);
            //dd($user);
            return redirect()->to('/admin/input-balita/'.$id)->with('status', 'Akun berhasil ditambahkan!');
    }
    public function show_timbang()
    {
        $timbang = DB::table('penimbangan')->join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->join('bidan', 'bidan.id_bidan', '=', 'penimbangan.id_bidan')->join('kader', 'kader.id_kader', '=', 'penimbangan.id_kader')->select('balita.nama','bidan.nama_bidan','kader.nama_kader', 'penimbangan.*')->get();
        // $soal = DB::table('soal')->get();
         //dd($timbang);
        return view('admin.timbang',compact('timbang'));
    }
    public function edit_detail_timbang($id)
    {
        $timbang = \App\Models\Penimbangan::join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->join('bidan', 'bidan.id_bidan', '=', 'penimbangan.id_bidan')->join('kader', 'kader.id_kader', '=', 'penimbangan.id_kader')->where('id_penimbangan',$id)->firstOrFail();
        $bidan = \App\Models\Bidan::all();
        $kader = \App\Models\Kader::all();
        $balita = \App\Models\Balita::all();
        return view('admin.edit-timbang',compact('timbang','bidan','kader','balita'));
    }
    public function show_detail_timbang(Request $request,$id)
    {
        $timbang = \App\Models\Penimbangan::join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->join('bidan', 'bidan.id_bidan', '=', 'penimbangan.id_bidan')->join('kader', 'kader.id_kader', '=', 'penimbangan.id_kader')->where('id_penimbangan',$id)->firstOrFail();
        return view('admin.detail-timbang',compact('timbang'));
    }
    public function delete_detail_timbang(Request $request,$id)
    {
        $timbang = \App\Models\Penimbangan::where('id_penimbangan',$id)->delete();
        return redirect('/admin/timbang')->with('status', 'Data diri penimbangan berhasil dihapus!');
    }
    public function update_detail_timbang(Request $request,$id)
    {
        $request->validate([
            'id_balita' => 'required|max:155',
            'id_bidan' => 'required|max:155',
            'id_kader' => 'required|max:155',
            'tgl' => 'required|max:155',
            'bb' => 'required|max:155',
            'tt' => 'required|max:155',
            ]);
            \App\Models\Penimbangan::where('id_penimbangan', $id)->update([
                'id_bidan' => $request->id_bidan,
                'id_balita' => $request->id_balita,
                'id_kader' => $request->id_kader,
                'tgl_timbang' => $request->tgl,
                'bb' => $request->bb,
                'tb' => $request->tt,
            ]);
            return redirect('/admin/timbang')->with('status', 'Data diri penimbangan berhasil dirubah!');
    }
    public function show_create_timbang()
    {
        $bidan = \App\Models\Bidan::all();
        $kader = \App\Models\Kader::all();
        $balita = \App\Models\Balita::all();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.input-timbang',[
            'balita' => $balita,
            'kader' => $kader,
            'bidan' => $bidan,]);
    }
    public function create_timbang(Request $request)
    {
        $request->validate([
            'id_balita' => 'required|max:155',
            'id_bidan' => 'required|max:155',
            'id_kader' => 'required|max:155',
            'tgl' => 'required|max:155',
            'bb' => 'required|max:155',
            'tt' => 'required|max:155',
            ]);
            \App\Models\Penimbangan::create([
                'id_bidan' => $request->id_bidan,
                'id_balita' => $request->id_balita,
                'id_kader' => $request->id_kader,
                'tgl_timbang' => $request->tgl,
                'bb' => $request->bb,
                'tb' => $request->tt,
            ]);
            return redirect('/admin/timbang')->with('status', 'Data penimbang berhasil ditambahkan!');
    }
    public function show_pelayanan()
    {
        $pelayanan = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('imunisasi', 'imunisasi.id_imun', '=', 'pelayanan.id_imun')
        ->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'pelayanan.id_vaksin')->select('balita.nama', 'vaksinasi.*', 'imunisasi.*', 'pelayanan.*')->get();
        // $vaksin = DB::table('dt_vaksin')->join('balita', 'balita.id_balita', '=', 'dt_vaksin.id_balita')->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'dt_vaksin.id_vaksin')->select('vaksinasi.*', 'dt_vaksin.*', 'balita.*')->get();
        // $imun = DB::table('dt_imunisasi')->join('balita', 'balita.id_balita', '=', 'dt_imunisasi.id_balita')->join('imunisasi', 'imunisasi.id_imun', '=', 'dt_imunisasi.id_imun')->select('imunisasi.*', 'dt_imunisasi.*', 'balita.*')->get();
        // $soal = DB::table('soal')->get();
         //dd($timbang);
        return view('admin.pelayanan',compact('pelayanan'));
    }
    public function edit_detail_pelayanan($id)
    {
        $pelayanan = \App\Models\Pelayanan::join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('bidan', 'bidan.id_bidan', '=', 'pelayanan.id_bidan')->join('kader', 'kader.id_kader', '=', 'pelayanan.id_kader')->join('penimbangan', 'penimbangan.id_penimbangan', '=', 'pelayanan.id_penimbangan')
        ->join('imunisasi', 'imunisasi.id_imun', '=', 'pelayanan.id_imun')
        ->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'pelayanan.id_vaksin')
        ->where('id_pelayanan',$id)->firstOrFail();
        $bidan = \App\Models\Bidan::all();
        $kader = \App\Models\Kader::all();
        $balita = \App\Models\Balita::all();
        $imun = \App\Models\Imunisasi::all();
        $vaksin = \App\Models\Vaksinasi::all();
        $penimbangan = \App\Models\Penimbangan::all();
        return view('admin.edit-pelayanan',compact('pelayanan','bidan','kader','balita','penimbangan','imun','vaksin'));
    }
    public function show_detail_pelayanan(Request $request,$id)
    {
        $pelayanan = \App\Models\Pelayanan::join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('bidan', 'bidan.id_bidan', '=', 'pelayanan.id_bidan')->join('kader', 'kader.id_kader', '=', 'pelayanan.id_kader')
        ->join('imunisasi', 'imunisasi.id_imun', '=', 'pelayanan.id_imun')
        ->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'pelayanan.id_vaksin')->where('id_pelayanan',$id)->firstOrFail();
        return view('admin.detail-pelayanan',compact('pelayanan'));
    }
    public function delete_detail_pelayanan(Request $request,$id)
    {
        $pelayanan = \App\Models\Pelayanan::where('id_pelayanan',$id)->delete();
        return redirect('/admin/pelayanan')->with('status', 'Data pelayanan berhasil dihapus!');
    }
    public function update_detail_pelayanan(Request $request,$id)
    {
        $request->validate([
            'id_timbang' => 'required|max:155',
            'id_balita' => 'required|max:155',
            'id_bidan' => 'required|max:155',
            'id_kader' => 'required|max:155',
            'tgl' => 'required|max:155',
            'vitamin' => 'required|max:155',
            'imunisasi' => 'required|max:155',
            'penyuluhan' => 'required|max:155',
            ]);
            \App\Models\Pelayanan::where('id_pelayanan', $id)->update([
                'id_bidan' => $request->id_bidan,
                'id_balita' => $request->id_balita,
                'id_kader' => $request->id_kader,
                'id_penimbangan' => $request->id_timbang,
                'tgl_layanan' => $request->tgl,
                'id_imun' => $request->vitamin,
                'id_vaksin' => $request->imunisasi,
                'penyuluhan' => $request->penyuluhan,
            ]);
            return redirect('/admin/pelayanan')->with('status', 'Data pelayanan berhasil dirubah!');
    }
    public function show_create_pelayanan()
    {
        $bidan = \App\Models\Bidan::all();
        $kader = \App\Models\Kader::all();
        $jadwal = \App\Models\Jadwal::all();
        $balita = \App\Models\Balita::all();
        $vaksin = \App\Models\Vaksinasi::all();
        $imun = \App\Models\Imunisasi::all();
        $penimbangan = DB::table('penimbangan')->join('balita', 'balita.id_balita', '=', 'penimbangan.id_balita')->join('bidan', 'bidan.id_bidan', '=', 'penimbangan.id_bidan')->join('kader', 'kader.id_kader', '=', 'penimbangan.id_kader')->select('balita.nama','bidan.nama_bidan','kader.nama_kader', 'penimbangan.*')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.input-pelayanan',[
            'balita' => $balita,
            'kader' => $kader,
            'jadwal' => $jadwal,
            'bidan' => $bidan,
            'vaksin' => $vaksin,
            'imun' => $imun,
            'penimbangan' => $penimbangan,]);
    }
    public function create_pelayanan(Request $request)
    {
        $request->validate([
            'id_timbang' => 'required|max:155',
            'id_balita' => 'required|max:155',
            'id_bidan' => 'required|max:155',
            'id_kader' => 'required|max:155',
            'tgl' => 'required|max:155',
            'vitamin' => 'required|max:155',
            'vaksin' => 'required|max:155',
            'penyuluhan' => 'required|max:155',
            ]);
            \App\Models\Pelayanan::create([
                'id_bidan' => $request->id_bidan,
                'id_balita' => $request->id_balita,
                'id_kader' => $request->id_kader,
                'id_penimbangan' => $request->id_timbang,
                'tgl_layanan' => $request->tgl,
                'id_imun' => $request->vitamin,
                'id_vaksin' => $request->vaksin,
                'penyuluhan' => $request->penyuluhan,
            ]);
            \App\Models\Imunisasi::where('id_imun', $request->vitamin)->update([
                'id_balita' => $request->id_balita,
            ]);
            \App\Models\Vaksinasi::where('id_vaksin', $request->vaksin)->update([
                'id_balita' => $request->id_balita,
            ]);
            return redirect('/admin/pelayanan')->with('status', 'Data pelayanan berhasil ditambahkan!');
    }
    public function pdf_laporan(Request $request)
    {
        $pelayanan = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('penimbangan', 'penimbangan.id_penimbangan', '=', 'pelayanan.id_penimbangan')->join('bidan', 'bidan.id_bidan', '=', 'pelayanan.id_bidan')->join('kader', 'kader.id_kader', '=', 'pelayanan.id_kader')
        ->join('imunisasi', 'imunisasi.id_imun', '=', 'pelayanan.id_imun')
        ->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'pelayanan.id_vaksin')->get();
        $pdf = PDF::loadView('admin.pdf-laporan', compact('pelayanan'));
        $pdf->save(storage_path().'_laporan.pdf');
        return $pdf->download('laporan.pdf');
    }
    public function pdf_laporan_bidan(Request $request)
    {
        $perempuan = 0;
        $laki = 1;
        $pelayanan = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('penimbangan', 'penimbangan.id_penimbangan', '=', 'pelayanan.id_penimbangan')->join('bidan', 'bidan.id_bidan', '=', 'pelayanan.id_bidan')->join('kader', 'kader.id_kader', '=', 'pelayanan.id_kader')->get();
        $kader = \App\Models\Kader::all();
        $balita = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->where('balita.jenis', 'LIKE', "%{$perempuan}%")->get();
        $balitae = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->where('balita.jenis', 'LIKE', "%{$laki}%")->get();
        $pdf = PDF::loadView('admin.pdf-laporan-bidan', compact('pelayanan','kader','balita','balitae'));
        $pdf->save(storage_path().'_laporan-bidan.pdf');
        return $pdf->download('laporan-bidan.pdf');
    }
    public function show_laporan(Request $request)
    {
        $pelayanan1 = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('penimbangan', 'penimbangan.id_penimbangan', '=', 'pelayanan.id_penimbangan')->join('bidan', 'bidan.id_bidan', '=', 'pelayanan.id_bidan')->join('kader', 'kader.id_kader', '=', 'pelayanan.id_kader')
        ->join('imunisasi', 'imunisasi.id_imun', '=', 'pelayanan.id_imun')
        ->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'pelayanan.id_vaksin')
        //  //dd($timbang);
        ->orderBy('tgl_layanan')
        ->groupBy('tgl_layanan')
        ->get();
        $pelayanan = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('penimbangan', 'penimbangan.id_penimbangan', '=', 'pelayanan.id_penimbangan')->join('bidan', 'bidan.id_bidan', '=', 'pelayanan.id_bidan')->join('kader', 'kader.id_kader', '=', 'pelayanan.id_kader')
        ->join('imunisasi', 'imunisasi.id_imun', '=', 'pelayanan.id_imun')
        ->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'pelayanan.id_vaksin')
        //  //dd($timbang);
        ->where('tgl_layanan', 'LIKE', "%{$request->search1}%")
        ->where('balita.nama', 'LIKE', "%{$request->search}%")
        ->get();
        //dd($pelayanan1);
        return view('admin.laporan',compact('pelayanan','pelayanan1'));
    }
    public function show_laporan_bidan(Request $request)
    {
        $perempuan = 0;
        $laki = 1;
        $pelayanan1 = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('penimbangan', 'penimbangan.id_penimbangan', '=', 'pelayanan.id_penimbangan')->join('bidan', 'bidan.id_bidan', '=', 'pelayanan.id_bidan')->join('kader', 'kader.id_kader', '=', 'pelayanan.id_kader')
        //  //dd($timbang);
        ->orderBy('tgl_layanan')
        ->groupBy('tgl_layanan')
        ->paginate(5);
        $pelayanan = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->join('penimbangan', 'penimbangan.id_penimbangan', '=', 'pelayanan.id_penimbangan')->join('bidan', 'bidan.id_bidan', '=', 'pelayanan.id_bidan')->join('kader', 'kader.id_kader', '=', 'pelayanan.id_kader')
        //  //dd($timbang);
        ->where('tgl_layanan', 'LIKE', "%{$request->search1}%")
        ->paginate(5);
        //$kadder = DB::table('kader')->select(DB::raw('COUNT(soals.nilai) as jumlah'))->where('status.status','LIKE',"%{$var1}%")->where('users.level','LIKE',"%{$var}%")->groupBy('status.id_user')->get();
        $kader = \App\Models\Kader::paginate(5);
        $balita = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->where('balita.jenis', 'LIKE', "%{$perempuan}%")->get();
        $balitae = DB::table('pelayanan')->join('balita', 'balita.id_balita', '=', 'pelayanan.id_balita')->where('balita.jenis', 'LIKE', "%{$laki}%")->get();
        //dd($pelayanan);
        return view('admin.laporan-bidan',compact('pelayanan','pelayanan1','kader','balita','balitae'));
    }
    public function show_vaksin()
    {
        $vaksin = \App\Models\Vaksinasi::all();
        $dtvaksin = DB::table('dt_vaksin')->join('balita', 'balita.id_balita', '=', 'dt_vaksin.id_balita')->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'dt_vaksin.id_vaksin')->select('vaksinasi.*', 'dt_vaksin.*', 'balita.*')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.vaksinasi',compact('vaksin','dtvaksin'));
    }
    public function show_create_vaksin()
    {
        return view('admin.input-vaksin');
    }
    public function edit_detail_vaksin($id)
    {
        $vaksin = \App\Models\Vaksinasi::where('id_vaksin',$id)->firstOrFail();
        return view('admin.edit-vaksin',compact('vaksin'));
    }
    public function show_detail_vaksin(Request $request,$id)
    {
        $vaksin = \App\Models\Vaksinasi::where('id_vaksin',$id)->firstOrFail();
        return view('admin.detail-vaksin',compact('vaksin'));
    }
    public function delete_detail_vaksin(Request $request,$id)
    {
        $vaksin = \App\Models\Vaksinasi::where('id_vaksin',$id)->delete();
        return redirect('/admin/vaksinasi')->with('status', 'Data vaksin berhasil dihapus!');
    }
    public function update_detail_vaksin(Request $request,$id)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'usia' => 'required|max:25',
            'jadwal' => 'required|max:25',
            ]);
            \App\Models\Vaksinasi::where('id_vaksin', $id)->update([
                'vaksin' => $request->nama,
                'usia' => $request->usia,
                'id_jadwal' => $request->jadwal,
            ]);
            return redirect('/admin/vaksinasi')->with('status', 'Data vaksin berhasil dirubah!');
    }
    public function create_vaksin(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'usia' => 'required|max:25',
            'jadwal' => 'required|max:25',
            ]);
            \App\Models\Vaksinasi::create([
                'vaksin' => $request->nama,
                'usia' => $request->usia,
                'id_jadwal' => $request->jadwal,
            ]);
            return redirect('/admin/vaksinasi')->with('status', 'Data vaksin berhasil ditambahkan!');
    }
    public function show_create_dtvaksin()
    {
        $balita = \App\Models\Balita::all();
        $vaksin = \App\Models\Vaksinasi::all();
        return view('admin.input-data-vaksin',compact('balita','vaksin'));
    }
    public function create_dtvaksin(Request $request)
    {
        $request->validate([
            'id_balita' => 'required|max:25',
            'id_vaksin' => 'required|max:25',
            ]);
            \App\Models\Dt_vaksin::create([
                'id_vaksin' => $request->id_vaksin,
                'id_balita' => $request->id_balita,
            ]);
            return redirect('/admin/vaksinasi')->with('vaksin', 'Data vaksinasi berhasil ditambahkan!');
    }
    public function show_detail_dtvaksin(Request $request,$id)
    {
        $dtvaksin = \App\Models\Dt_vaksin::join('balita', 'balita.id_balita', '=', 'dt_vaksin.id_balita')->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'dt_vaksin.id_vaksin')->where('id_dtvaksin',$id)->firstOrFail();
        return view('admin.detail-data-vaksin',compact('dtvaksin'));
    }
    public function edit_detail_dtvaksin($id)
    {
        $balita = \App\Models\Balita::all();
        $vaksin = \App\Models\Vaksinasi::all();
        $dtvaksin = \App\Models\Dt_vaksin::join('balita', 'balita.id_balita', '=', 'dt_vaksin.id_balita')->join('vaksinasi', 'vaksinasi.id_vaksin', '=', 'dt_vaksin.id_vaksin')->where('id_dtvaksin',$id)->firstOrFail();
        //dd($balita);
        return view('admin.edit-data-vaksin',compact('dtvaksin','balita','vaksin'));
    }
    public function delete_detail_dtvaksin(Request $request,$id)
    {
        $dtvaksin = \App\Models\Dt_vaksin::where('id_dtvaksin',$id)->delete();
        return redirect('/admin/vaksinasi')->with('vaksin', 'Data vaksinasi berhasil dihapus!');
    }
    public function update_detail_dtvaksin(Request $request,$id)
    {
        $request->validate([
            'id_balita' => 'required|max:25',
            'id_vaksin' => 'required|max:25',
            ]);
            \App\Models\Dt_vaksin::where('id_dtvaksin', $id)->update([
                'id_balita' => $request->id_balita,
                'id_vaksin' => $request->id_vaksin,
            ]);
            return redirect('/admin/vaksinasi')->with('vaksin', 'Data vaksinasi berhasil dirubah!');
    }
    public function show_imun()
    {
        $imun = \App\Models\Imunisasi::all();
        $dtimun = DB::table('dt_imunisasi')->join('balita', 'balita.id_balita', '=', 'dt_imunisasi.id_balita')->join('imunisasi', 'imunisasi.id_imun', '=', 'dt_imunisasi.id_imun')->select('imunisasi.*', 'dt_imunisasi.*', 'balita.*')->get();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.imunisasi',compact('imun','dtimun'));
    }
    public function show_create_imun()
    {
        return view('admin.input-imun');
    }
    public function edit_detail_imun($id)
    {
        $imun = \App\Models\Imunisasi::where('id_imun',$id)->firstOrFail();
        return view('admin.edit-imun',compact('imun'));
    }
    public function show_detail_imun(Request $request,$id)
    {
        $imun = \App\Models\Imunisasi::where('id_imun',$id)->firstOrFail();
        return view('admin.detail-imun',compact('imun'));
    }
    public function delete_detail_imun(Request $request,$id)
    {
        $imun = \App\Models\Imunisasi::where('id_imun',$id)->delete();
        return redirect('/admin/imunisasi')->with('status', 'Data imunisasi berhasil dihapus!');
    }
    public function update_detail_imun(Request $request,$id)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'usia' => 'required|max:25',
            'jadwal' => 'required|max:25',
            ]);
            \App\Models\Imunisasi::where('id_imun', $id)->update([
                'imunisasi' => $request->nama,
                'usia' => $request->usia,
                'id_jadwal' => $request->jadwal,
            ]);
            return redirect('/admin/imunisasi')->with('status', 'Data imunisasi berhasil dirubah!');
    }
    public function create_imun(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'usia' => 'required|max:25',
            'jadwal' => 'required|max:25',
            ]);
            \App\Models\Imunisasi::create([
                'imunisasi' => $request->nama,
                'usia' => $request->usia,
                'id_jadwal' => $request->jadwal,
            ]);
            return redirect('/admin/imunisasi')->with('status', 'Data jenis imun berhasil ditambahkan!');
    }
    public function show_create_dtimun()
    {
        $balita = \App\Models\Balita::all();
        $imun = \App\Models\Imunisasi::all();
        return view('admin.input-data-imun',compact('balita','imun'));
    }
    public function create_dtimun(Request $request)
    {
        $request->validate([
            'id_balita' => 'required|max:25',
            'id_imun' => 'required|max:25',
            ]);
            \App\Models\Dt_imunisasi::create([
                'id_imun' => $request->id_imun,
                'id_balita' => $request->id_balita,
            ]);
            return redirect('/admin/imunisasi')->with('imun', 'Data imunisasi berhasil ditambahkan!');
    }
    public function show_detail_dtimun(Request $request,$id)
    {
        $dtimun = \App\Models\Dt_imunisasi::join('balita', 'balita.id_balita', '=', 'dt_imunisasi.id_balita')->join('imunisasi', 'imunisasi.id_imun', '=', 'dt_imunisasi.id_imun')->where('id_dtimun',$id)->firstOrFail();
        return view('admin.detail-data-imun',compact('dtimun'));
    }
    public function edit_detail_dtimun($id)
    {
        $balita = \App\Models\Balita::all();
        $imun = \App\Models\Imunisasi::all();
        $dtimun = \App\Models\Dt_imunisasi::join('balita', 'balita.id_balita', '=', 'dt_imunisasi.id_balita')->join('imunisasi', 'imunisasi.id_imun', '=', 'dt_imunisasi.id_imun')->where('id_dtimun',$id)->firstOrFail();
        //dd($balita);
        return view('admin.edit-data-imun',compact('dtimun','balita','imun'));
    }
    public function delete_detail_dtimun(Request $request,$id)
    {
        $dtimun = \App\Models\Dt_imunisasi::where('id_dtimun',$id)->delete();
        return redirect('/admin/imunisasi')->with('imun', 'Data imunisasi berhasil dihapus!');
    }
    public function update_detail_dtimun(Request $request,$id)
    {
        $request->validate([
            'id_balita' => 'required|max:25',
            'id_imun' => 'required|max:25',
            ]);
            \App\Models\Dt_imunisasi::where('id_dtimun', $id)->update([
                'id_balita' => $request->id_balita,
                'id_imun' => $request->id_imun,
            ]);
            return redirect('/admin/imunisasi')->with('imun', 'Data imunisasi berhasil dirubah!');
    }
    public function show_jadwal()
    {
        $jadwal = \App\Models\Jadwal::all();
        // $soal = DB::table('soal')->get();
        // dd($soal);
        return view('admin.jadwal',compact('jadwal'));
    }
    public function show_create_jadwal()
    {
        return view('admin.input-jadwal');
    }
    public function edit_detail_jadwal($id)
    {
        $jadwal = \App\Models\Jadwal::where('id_jadwal',$id)->firstOrFail();
        return view('admin.edit-jadwal',compact('jadwal'));
    }
    public function show_detail_jadwal(Request $request,$id)
    {
        $jadwal = \App\Models\Jadwal::where('id_jadwal',$id)->firstOrFail();
        return view('admin.detail-jadwal',compact('jadwal'));
    }
    public function delete_detail_jadwal(Request $request,$id)
    {
        $jadwal = \App\Models\Jadwal::where('id_jadwal',$id)->delete();
        return redirect('/admin/jadwal')->with('status', 'Data jadwal berhasil dihapus!');
    }
    public function update_detail_jadwal(Request $request,$id)
    {
        $request->validate([
            'kegiatan' => 'required|max:25',
            'tgl' => 'required|max:155',
            ]);
            \App\Models\Jadwal::where('id_jadwal', $id)->update([
                'nama_kegiatan' => $request->kegiatan,
                'tgl_kegiatan' => $request->tgl,
            ]);
            return redirect('/admin/jadwal')->with('status', 'Data jadwal berhasil dirubah!');
    }
    public function create_jadwal(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|max:25',
            'tgl' => 'required|max:155',
            ]);
            \App\Models\Jadwal::create([
                'nama_kegiatan' => $request->kegiatan,
                'tgl_kegiatan' => $request->tgl,
            ]);
            return redirect('/admin/jadwal')->with('status', 'Data jadwal berhasil ditambahkan!');
    }
    public function show_posyandu()
    {
        $posyandu = \App\Models\Posyandu::all();
        //$posyanduss = \App\Models\Posyandu::all();
        //$posyanduss = \App\Models\Posyandu::all();
        //dd($posyandus);
        return view('admin.posyandu',compact('posyandu'));
    }
    public function edit_posyandu($id)
    {
        $posyandu = \App\Models\Posyandu::where('id_posyandu',$id)->firstOrFail();
        //$posyanduss = \App\Models\Posyandu::all();
        //dd($posyandu);
        return view('admin.edit-posyandu',compact('posyandu'));
    }
    public function update_posyandu(Request $request,$id)
    {
        $request->validate([
            'nama' => 'required|max:25',
            ]);
            \App\Models\Posyandu::where('id_posyandu', $id)->update([
                'posyandu' => $request->nama,
            ]);
            return redirect('/admin/posyandu')->with('status', 'Data posyandu berhasil dirubah!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function show($id)
    {
        //
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
