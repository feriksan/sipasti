<?php

namespace App\Http\Controllers;

use App\Models\GedungBangunanModel;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

date_default_timezone_set("Asia/Jakarta");

class GedungBangunanController extends Controller
{
    use FileUploadTrait;
    
    public function __construct()
    {
        $this->GedungBangunanModel = new GedungBangunanModel();
        $this->User = new User();
    }


    public function index()
    {
        $SuratKeluarModel = new SuratKeluarModel();
        $PejabatModel = new PejabatModel();
        $User = new User();

        $surke = $SuratKeluarModel->tampil_surke();
        $kode_otomatis1 =$SuratKeluarModel->kode_otomatis1();
        $kode_otomatis2 =$SuratKeluarModel->kode_otomatis2();
        $pejabat = $PejabatModel->pejabat();
        $user = $User->tampil_user();

        $data = [
            'judul_web' => 'Daftar Surat Keluar',
            'judul_halaman' => 'Daftar Surat Keluar',
            'kode_otomatis1' => $kode_otomatis1,
            'kode_otomatis2' => $kode_otomatis2,
            'pejabat' => $pejabat,
            'user' => $user,
            'surke' => $surke,
        ];
        return view('surke/tampil_surke', $data);
    }


    public function index_direktur()
    {
        $SuratKeluarModel = new SuratKeluarModel();
        $PejabatModel = new PejabatModel();
        $User = new User();

        $surke = $SuratKeluarModel->tampil_surke();
        $pejabat = $PejabatModel->pejabat();
        $user = $User->tampil_user();

        $data = [
            'judul_web' => 'Daftar Surat Keluar',
            'judul_halaman' => 'Daftar Surat Keluar',
            'pejabat' => $pejabat,
            'user' => $user,
            'surke' => $surke,
        ];
        return view('surke/tampil_surkeDir', $data);
    }

    
    public function data(Request $request)
    {
        $tgl_awal = date("Y-m-d", strtotime($request->input('tgl_awal')));
        $tgl_akhir = date("Y-m-d", strtotime($request->input('tgl_akhir')));
        $SuratKeluarModel = new SuratKeluarModel();
        $data_surke = $SuratKeluarModel->data_surke($tgl_awal, $tgl_akhir);

        $data = [
            'judul_web' => 'Data Surat Keluar',
            'judul_halaman' => 'Data Surat Keluar',
            'data_surke' => $data_surke,
        ];
        return view('surke/data_surke', $data);
    }


    public function data_direktur(Request $request)
    {
        $tgl_awal = date("Y-m-d", strtotime($request->input('tgl_awal')));
        $tgl_akhir = date("Y-m-d", strtotime($request->input('tgl_akhir')));
        $SuratKeluarModel = new SuratKeluarModel();
        $data_surke = $SuratKeluarModel->data_surke($tgl_awal, $tgl_akhir);

        $data = [
            'judul_web' => 'Data Surat Keluar',
            'judul_halaman' => 'Data Surat Keluar',
            'data_surke' => $data_surke,
        ];
        return view('surke/data_surkeDir', $data);
    }


    // ===========================================

    public function tambah_surke(Request $request)
    {
        $kode1 = $request->kode1;
        $kode2 = $request->kode2;
        $no_surat = $kode1 . $kode2;

        $file = $this->fileUpload($request->file, 'document');
        $data['file'] = $file;

        $validator  = Validator::make($request->all(), [
            'nama_surat' => ['required'],
            'jenis_surat' => ['required'],
            'perihal' => ['required'],
            'tujuan' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $data = [
            'kode_surat' => $request->kode_surat,
            'tgl_keluar' => date("Y-m-d", strtotime($request->tgl_keluar)),
            'no_surat' => $no_surat,
            'tgl_surat' => date("Y-m-d", strtotime($request->tgl_surat)),
            'jenis_surat' => $request->jenis_surat,
            'nama_surat' => $request->nama_surat,
            'perihal' => $request->perihal,
            'tujuan' => $request->tujuan,
            'file' => $file,
            'status_admin' => $request->status_admin,
            'status_direktur' => $request->status_direktur,
        ];
        $simpan =  $this->SuratKeluarModel->tambah_surke($data);
        if ($simpan) {
            return Redirect('/surke')->with('pesan', 'Surat Keluar Berhasil Disimpan');
        } else {
            return Redirect('/surke')->with('error', 'Surat Keluar Gagal Disimpan');
        }
    }


    // ===========================================

    public function buka_surke(Request $request)
    {
        $SuratKeluarModel = new SuratKeluarModel();
        $kode_surat = $request->kode_surat;
        $surke = $SuratKeluarModel->tampil_surke();
        $buka_surke = $SuratKeluarModel->buka_surke($kode_surat);

        $data = [
            'judul_web' => 'Buka Surat Keluar',
            'judul_halaman' => 'Buka Surat Keluar',
            'surke' => $surke,
            'buka_surke' => $buka_surke,
        ];
        return view('surke/buka_surke', $data);
    }


    public function buka_surke1(Request $request)
    {
        $SuratKeluarModel = new SuratKeluarModel();
        $kode_surat = $request->kode_surat;
        $surke = $SuratKeluarModel->tampil_surke();
        $buka_surke = $SuratKeluarModel->buka_surke($kode_surat);

        $data = [
            'judul_web' => 'Buka Surat Keluar',
            'judul_halaman' => 'Buka Surat Keluar',
            'surke' => $surke,
            'buka_surke' => $buka_surke,
        ];
        return view('surke/buka_surke1', $data);
    }


    public function validasi_direktur(Request $request)
    {
        $SuratKeluarModel = new SuratKeluarModel();
        $PejabatModel = new PejabatModel();
        $kode_surat = $request->kode_surat;
        $surke = $SuratKeluarModel->tampil_surke();
        $buka_surke = $SuratKeluarModel->buka_surke($kode_surat);
        $pejabat = $PejabatModel->pejabat();

        $data = [
            'judul_web' => 'Validasi Surat Keluar',
            'judul_halaman' => 'Validasi Surat Keluar',
            'surke' => $surke,
            'buka_surke' => $buka_surke,
            'pejabat' => $pejabat,
        ];
        return view('disposisi/validasi_direktur', $data);
    }


    // ========== Edit - Update =========
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
        $update =  $this->SuratKeluarModel->update_surke($data, $kode_surat);
        if ($update) {
            return Redirect('/surke')->with('pesan', 'Surat Keluar Berhasil Diupdate');
        } else {
            return Redirect('/surke')->with('error', 'Surat Keluar Gagal Diupdate');
        }
    }


    // ======== Hapus ==========
    public function delete($kode_surat)
    {
        $data = [
            'kode_surat' => $kode_surat,
        ];
        $hapus =  $this->SuratKeluarModel->hapus_surke($data, $kode_surat);
        if ($hapus) {
            return Redirect('/surke')->with('pesan', 'Data Surat Keluar Berhasil Dihapus');
        } else {
            return Redirect('/surke')->with('error', 'Hapus Data Surat Keluar Gagal !!');
        }
    }
}
