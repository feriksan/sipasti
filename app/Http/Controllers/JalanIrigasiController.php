<?php

namespace App\Http\Controllers;

use App\Models\JalanIrigasiModel;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

date_default_timezone_set("Asia/Jakarta");

class JalanIrigasiController extends Controller
{

    public function __construct()
    {
        $this->JalanIrigasiModel = new JalanIrigasiModel();
    }

    public function index()
    {
        $JalanIrigasiModel = new JalanIrigasiModel();
        $pejabat = $JalanIrigasiModel->pejabat();
        $kode_otomatis =$JalanIrigasiModel->kode_otomatis();

        $data = [
            'judul_web' => 'Daftar Pejabat',
            'judul_halaman' => 'Daftar Pejabat',
            'kode_otomatis' => $kode_otomatis,
            'pejabat' => $pejabat,
        ];
        return view('pejabat/tampil_pejabat', $data);
    }

    // ===========================================

    public function tambah_pejabat(Request $request)
    {
        $kode_pejabat = $request->kode_pejabat;
        $nama_pejabat = $request->nama_pejabat;
        $created_at =  date("Y-m-d", strtotime($request->tgl_upload));
        $updated_at = date("Y-m-d", strtotime($request->tgl_update));

        $validator  = Validator::make($request->all(), [
            'kode_pejabat' => ['required'],
            'nama_pejabat' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $data = [
            'kode_pejabat' => $kode_pejabat,
            'nama_pejabat' => $nama_pejabat,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ];
        $simpan =  $this->PejabatModel->tambah_pejabat($data);
        if ($simpan) {
            return Redirect('/pejabat')->with('pesan', 'Data Pejabat Berhasil Disimpan');
        } else {
            return Redirect('/pejabat')->with('error', 'Data Pejabat Gagal Disimpan');
        }
    }


    // ========== Edit - Update =========
    public function update(Request $request, $kode_pejabat)
    {
        $kode_pejabat = $request->kode_pejabat;
        $nama_pejabat = $request->nama_pejabat;
        $created_at =  date("Y-m-d", strtotime($request->tgl_upload));
        $updated_at = date("Y-m-d", strtotime($request->tgl_update));

        $data = [
            'kode_pejabat' => $kode_pejabat,
            'nama_pejabat' => $nama_pejabat,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ];
        $update =  $this->PejabatModel->update_pejabat($data, $kode_pejabat);
        if ($update) {
            return Redirect('/pejabat')->with('pesan', 'Data Pejabat Berhasil Diubah');
        } else {
            return Redirect('/pejabat')->with('error', 'Data Pejabat Gagal Diubah');
        }
    }


    // ======== Hapus ==========
    public function delete($kode_pejabat)
    {
        $data = [
            'kode_pejabat' => $kode_pejabat,
        ];
        $hapus =  $this->PejabatModel->hapus_pejabat($data, $kode_pejabat);
        if ($hapus) {
            return Redirect('/pejabat')->with('pesan', 'Data Pejabat Berhasil Dihapus');
        } else {
            return Redirect('/pejabat')->with('error', 'Hapus Data Pejabat Gagal !!');
        }
    }
}
