<?php

namespace App\Http\Controllers;

use App\Models\TanahModel;
use App\Models\RuangModel;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportRuang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

date_default_timezone_set("Asia/Jakarta");

class PengaturanController extends Controller
{
    
    public function __construct()
    {
        $this->TanahModel = new TanahModel();
        $this->RuangModel = new RuangModel();
        $this->User = new User();
    }


    public function tampil_ruang()
    {
        $RuangModel = new RuangModel();
        $User = new User();

        $ruang = $RuangModel->tampil_ruang();
        $user = $User->tampil_user();

        $data = [
            'judul_web' => 'Daftar Ruangan',
            'judul_halaman' => 'Daftar Ruangan',
            'ruang' => $ruang,
            'user' => $user,
        ];
        return view('pengaturan/tampil_ruang', $data);
    }


    public function importExcel(Request $request)
    {
        $file = $request->file('file_excel');
        Excel::import(new ImportRuang, $file);
        return Redirect('/kode-ruang')->with('pesan', 'Data Berhasil Ditarik');
    }


    public function index_direktur()
    {
        $DisposisiModel = new DisposisiModel();
        $PejabatModel = new PejabatModel();
        $User = new User();

        $disposisi = $DisposisiModel->monitoring_disposisi();
        $pejabat = $PejabatModel->pejabat();
        $user = $User->tampil_user();

        $data = [
            'judul_web' => 'Monitoring Disposisi',
            'judul_halaman' => 'Monitoring Disposisi',
            'pejabat' => $pejabat,
            'user' => $user,
            'disposisi' => $disposisi,
        ];
        return view('disposisi/monitoring_disposisiDir', $data);
    }

    public function index_operator()
    {
        $DisposisiModel = new DisposisiModel();
        $PejabatModel = new PejabatModel();
        $User = new User();
        $kode_pejabat = Auth::user()?->kode_user;

        $disposisi = $DisposisiModel->monitoring_disposisiOp($kode_pejabat);
        $pejabat = $PejabatModel->pejabat();
        $user = $User->tampil_user();

        $data = [
            'judul_web' => 'Monitoring Disposisi',
            'judul_halaman' => 'Monitoring Disposisi',
            'pejabat' => $pejabat,
            'user' => $user,
            'disposisi' => $disposisi,
        ];
        return view('disposisi/monitoring_disposisiOp', $data);
    }

    
    public function data(Request $request)
    {
        $tgl_awal = date("Y-m-d", strtotime($request->input('tgl_awal')));
        $tgl_akhir = date("Y-m-d", strtotime($request->input('tgl_akhir')));
        $DisposisiModel = new DisposisiModel();
        $data_disposisi = $DisposisiModel->data_disposisi($tgl_awal, $tgl_akhir);

        $data = [
            'judul_web' => 'Data Monitoring Disposisi',
            'judul_halaman' => 'Data Monitoring Disposisi',
            'data_disposisi' => $data_disposisi,
        ];
        return view('disposisi/data_disposisi', $data);
    }


    public function data_direktur(Request $request)
    {
        $tgl_awal = date("Y-m-d", strtotime($request->input('tgl_awal')));
        $tgl_akhir = date("Y-m-d", strtotime($request->input('tgl_akhir')));
        $DisposisiModel = new DisposisiModel();
        $data_disposisi = $DisposisiModel->data_disposisi($tgl_awal, $tgl_akhir);

        $data = [
            'judul_web' => 'Data Monitoring Disposisi',
            'judul_halaman' => 'Data Monitoring Disposisi',
            'data_disposisi' => $data_disposisi,
        ];
        return view('disposisi/data_disposisiDir', $data);
    }


    public function data_operator(Request $request)
    {
        $kode_pejabat = Auth::user()?->kode_user;
        $tgl_awal = date("Y-m-d", strtotime($request->input('tgl_awal')));
        $tgl_akhir = date("Y-m-d", strtotime($request->input('tgl_akhir')));
        $DisposisiModel = new DisposisiModel();
        $data_disposisiOp = $DisposisiModel->data_disposisiOp($tgl_awal, $tgl_akhir, $kode_pejabat);

        $data = [
            'judul_web' => 'Data Monitoring Disposisi',
            'judul_halaman' => 'Data Monitoring Disposisi',
            'data_disposisiOp' => $data_disposisiOp,
        ];
        return view('disposisi/data_disposisiOp', $data);
    }


    // ===========================================

    public function tambah_disposisi(Request $request, $kode_surat)
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


    public function tambah_disposisiOp(Request $request, $kode_surat)
    {
        $tujuan_disposisi3 = $request->tujuan_disposisi3;
        $isi_disposisi1 = $request->isi_disposisi1;
        $status_pejabat = 'Dilaksanakan';
        $status_admin = 'Selesai';

        $validator  = Validator::make($request->all(), [
            'tujuan_disposisi3' => ['required'],
            'isi_disposisi1' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $data = [
            'kode_surat' => $kode_surat,
            'tujuan_disposisi3' => $tujuan_disposisi3,
            'isi_disposisi1' => $isi_disposisi1,
            'status_pejabat' => $status_pejabat,
            'status_admin' => $status_admin,
        ];
        $update =  $this->SuratMasukModel->update_surma1($data, $kode_surat);
        if ($update) {
            return Redirect('/surma-operator')->with('pesan', 'Disposisi Berhasil Diselesaikan');
        } else {
            return Redirect('/surma-operator')->with('error', 'Disposisi Gagal Diselesaikan');
        }
    }


    public function cetak_disposisi($kode_surat)
    {
        $cetak_disposisi = $this->DisposisiModel->cetak_disposisi($kode_surat);
        $data = [
            'judul_web' => 'Cetak Disposisi',
            'judul_halaman' => 'Cetak Disposisi',
            'cetak_disposisi' => $cetak_disposisi,
            'cetak_disposisi' => $cetak_disposisi,
        ];
        return view('disposisi/cetak_disposisi', $data);
    }


    public function cetak_disposisiOp($kode_surat)
    {
        $cetak_disposisi = $this->DisposisiModel->cetak_disposisiOp($kode_surat);
        $data = [
            'judul_web' => 'Cetak Disposisi',
            'judul_halaman' => 'Cetak Disposisi',
            'cetak_disposisi' => $cetak_disposisi,
            'cetak_disposisi' => $cetak_disposisi,
        ];
        return view('disposisi/cetak_disposisiOp', $data);
    }

    
    // ===========================================

    public function buka_surma(Request $request)
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
