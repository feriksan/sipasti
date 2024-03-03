<?php

namespace App\Http\Controllers;

use App\Models\TanahModel;
use App\Models\RuangModel;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportExcel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

date_default_timezone_set("Asia/Jakarta");

class TanahController extends Controller
{
    
    public function __construct()
    {
        $this->TanahModel = new TanahModel();
        $this->RuangModel = new RuangModel();
        $this->User = new User();
    }


    public function tampil_kibtanah()
    {
        $TanahModel = new TanahModel();
        $RuangModel = new RuangModel();
        $User = new User();

        $kib_tanah = $TanahModel->kib_tanah();
        $ruang = $RuangModel->tampil_ruang();
        $user = $User->tampil_user();

        $data = [
            'judul_web' => 'KIB Aset Tanah',
            'judul_halaman' => 'KIB Aset Tanah',
            'kib_tanah' => $kib_tanah,
            'ruang' => $ruang,
            'user' => $user,
        ];
        $html = view('kib_tanah/tampil_kibtanah', $data)->render();
        return response($html, 200)->header('Content-Type', 'text/html');
    }
    
    public function returnHTML(){
        $html = '<h1>Hello</h1>';
        return response($html, 200)->header('Content-Type', 'text/html');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file_excel');
        Excel::import(new ImportExcel, $file);
        return Redirect('/kib-tanah')->with('pesan', 'Data Berhasil Ditarik');
    }



    // ===========================================

    public function tambah_tanah(Request $request, $kode_surat)
    {
        $kode_surat = $request->kode_surat;
        $sifat = $request->sifat;
        $tujuan_disposisi1 = $request->tujuan_disposisi1;
        $tujuan_disposisi2 = $request->tujuan_disposisi2;
        $isi_disposisi = $request->isi_disposisi;
        $status_direktur = 'Dikirim';

        $validator  = Validator::make($request->all(), [
            'sifat' => ['required'],
            'tujuan_disposisi1' => ['required'],
            'tujuan_disposisi2' => ['required'],
            'isi_disposisi' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $data = [
            'kode_surat' => $kode_surat,
            'tgl_disposisi' => date("Y-m-d", strtotime($request->tgl_disposisi)),
            'sifat' => $sifat,
            'tujuan_disposisi1' => $tujuan_disposisi1,
            'tujuan_disposisi2' => $tujuan_disposisi2,
            'isi_disposisi' => $isi_disposisi,
            'status_direktur' => $status_direktur,
        ];
        $update =  $this->SuratMasukModel->update_surma($data, $kode_surat);
        if ($update) {
            return Redirect('/surma-direktur')->with('pesan', 'Disposisi Berhasil Dikirim');
        } else {
            return Redirect('/surma-direktur')->with('error', 'Disposisi Gagal Dikirim');
        }
    }


    // ===========================================

    public function buka_tanah(Request $request)
    {
        $DisposisiModel = new DisposisiModel();
        $kode_surat = $request->kode_surat;
        $surma = $DisposisiModel->tampil_surma();
        $buka_surma = $DisposisiModel->buka_surma($kode_surat);

        $data = [
            'judul_web' => 'Buka Surat Masuk',
            'judul_halaman' => 'Buka Surat Masuk',
            'surma' => $surma,
            'buka_surma' => $buka_surma,
        ];
        return view('surma/buka_surma', $data);
    }


    // ========== Edit - Update =========
    public function edit(Request $request)
    {
        $kode_arsip = $request->kode_arsip;
        $arsip = DB::table('tbl_arsip')->where('kode_arsip', $kode_arsip)->first();
        $jenis_arsip = DB::table('tbl_jenis_arsip')->get();
        $unit_kerja = DB::table('tbl_unit_kerja')->get();
        $detail_arsip = DB::table('tbl_arsip')
            ->JOIN('tbl_jenis_arsip', 'tbl_jenis_arsip.kode_jenis_arsip', '=', 'tbl_arsip.kode_jenis_arsip')
            ->JOIN('tbl_unit_kerja', 'tbl_unit_kerja.kode_unit_kerja', '=', 'tbl_arsip.kode_unit_kerja')
            ->JOIN('users', 'users.kode_user', '=', 'tbl_arsip.kode_user')
            ->SELECT('tbl_arsip.*', 'tbl_jenis_arsip.jenis_arsip', 'tbl_unit_kerja.unit_kerja', 'users.nama')
            ->WHERE('tbl_arsip.kode_arsip', '=', $kode_arsip)
            ->first();

        $data = [
            'judul_web' => 'Detail Arsip',
            'judul_halaman' => 'Detail Arsip',
            'jenis_arsip' => $jenis_arsip,
            'unit_kerja' => $unit_kerja,
            'arsip' => $arsip,
            'detail_arsip' => $detail_arsip,
        ];
        return view('arsip/detail_arsip', $data);
    }


    public function update(Request $request, $kode_surat)
    {
        $kode_surat = $request->kode_surat;
        $tgl_masuk = date("Y-m-d", strtotime($request->tgl_masuk));
        $no_surat = $request->no_surat;
        $tgl_surat = date("Y-m-d", strtotime($request->tgl_surat));
        $nama_surat = $request->nama_surat;
        $perihal = $request->perihal;
        $pengirim = $request->pengirim;

        $data = [
            'kode_surat' => $kode_surat,
            'tgl_masuk' => $tgl_masuk,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'nama_surat' => $nama_surat,
            'perihal' => $perihal,
            'pengirim' => $pengirim,
        ];
        $update =  $this->DisposisiModel->update_surma($data, $kode_surat);
        if ($update) {
            return Redirect('/surma')->with('pesan', 'Surat Masuk Berhasil Diupdate');
        } else {
            return Redirect('/surma')->with('error', 'Surat Masuk Gagal Diupdate');
        }
    }


    // ======== Hapus ==========
    public function delete($kode_surat)
    {
        $data = [
            'kode_surat' => $kode_surat,
        ];
        $hapus =  $this->DisposisiModel->hapus_surma($data, $kode_surat);
        if ($hapus) {
            return Redirect('/surma')->with('pesan', 'Data Surat Masuk Berhasil Dihapus');
        } else {
            return Redirect('/surma')->with('error', 'Hapus Data Surat Masuk Gagal !!');
        }
    }
}
