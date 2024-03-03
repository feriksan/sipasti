<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlatMesinModel extends Model
{
    use HasFactory;

    protected $appends = ['file_url'];

    public function getFileUrlAttribute()
    {
        if ($this->file) {
            return asset('uploads/document/' . $this->file);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }


    public function kibalat()
    {
        $query = DB::table('tbl_alatmesin')
            ->get();
        return $query;
    }


    public function simpan_alat($data)
    {
        $query = DB::table('tbl_alatmesin')
            ->insert($data);
        return $query;
    }



    // public function monitoring_disposisiOp($kode_pejabat)
    // {
    //     $today = Carbon::today();
    //     $query = DB::table('tbl_surma')
    //         ->join('tbl_pejabat as pejabat1', 'tbl_surma.tujuan_disposisi1', '=', 'pejabat1.kode_pejabat')
    //         ->join('tbl_pejabat as pejabat2', 'tbl_surma.tujuan_disposisi2', '=', 'pejabat2.kode_pejabat')
    //         ->join('tbl_pejabat as pejabat3', 'tbl_surma.tujuan_disposisi3', '=', 'pejabat3.kode_pejabat')
    //         ->where('tujuan_disposisi1', '=', $kode_pejabat)
    //         ->whereDate('tbl_surma.tgl_masuk', '=', $today)
    //         ->select('tbl_surma.*', 'pejabat1.nama_pejabat as nama_pejabat1', 'pejabat2.nama_pejabat as nama_pejabat2', 'pejabat3.nama_pejabat as nama_pejabat3')
    //         ->get();
    //     return $query;
    // }


    // public function cetak_disposisi($kode_surat)
    // {
    //     $query = DB::table('tbl_surma')
    //         ->join('tbl_pejabat as pejabat1', 'tbl_surma.tujuan_disposisi1', '=', 'pejabat1.kode_pejabat')
    //         ->join('tbl_pejabat as pejabat2', 'tbl_surma.tujuan_disposisi2', '=', 'pejabat2.kode_pejabat')
    //         ->where('tbl_surma.kode_surat', '=', $kode_surat)
    //         ->select('tbl_surma.*', 'pejabat1.nama_pejabat as nama_pejabat1', 'pejabat2.nama_pejabat as nama_pejabat2')
    //         ->first();
    //     return $query;
    // }


    // public function cetak_disposisiOp($kode_surat)
    // {
    //     $query = DB::table('tbl_surma')
    //         ->join('tbl_pejabat as pejabat1', 'tbl_surma.tujuan_disposisi1', '=', 'pejabat1.kode_pejabat')
    //         ->join('tbl_pejabat as pejabat2', 'tbl_surma.tujuan_disposisi2', '=', 'pejabat2.kode_pejabat')
    //         ->join('tbl_pejabat as pejabat3', 'tbl_surma.tujuan_disposisi3', '=', 'pejabat3.kode_pejabat')
    //         ->where('tbl_surma.kode_surat', '=', $kode_surat)
    //         ->select('tbl_surma.*', 'pejabat1.nama_pejabat as nama_pejabat1', 'pejabat2.nama_pejabat as nama_pejabat2', 'pejabat3.nama_pejabat as nama_pejabat3')
    //         ->first();
    //     return $query;
    // }


    // public function data_disposisi($tgl_awal, $tgl_akhir)
    // {
    //     $query = DB::table('tbl_surma')
    //         ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
    //         ->GET();
    //     return $query;
    // }


    // public function data_disposisiOp($tgl_awal, $tgl_akhir, $kode_pejabat)
    // {
    //     $query = DB::table('tbl_surma')
    //         ->where('tujuan_disposisi1', '=', $kode_pejabat)
    //         ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
    //         ->GET();
    //     return $query;
    // }



    // public function kode_otomatis()
    // {
    //     $query = DB::table('tbl_surma')
    //     ->select(DB::raw('RIGHT(tbl_surma.kode_surat,4) as kode_surat', FALSE))
    //     ->orderBy('kode_surat', 'DESC')
    //     ->limit(1)
    //     ->get();
    //     if ($query->count() <> 0) {
    //         $data = $query->first();
    //         $kode_baru = intval($data->kode_surat) + 1;
    //     } else {
    //         $kode_baru = 1;
    //     }
    //     $nomorUrut = str_pad($kode_baru, 4, "0", STR_PAD_LEFT);
    //     return "SM-". date("Y") . $nomorUrut;
    // }


    // public function tambah_surma($data)
    // {
    //     $query = DB::table('tbl_surma')
    //         ->insert($data);
    //     return $query;
    // }


    // public function buka_surma($kode_surat)
    // {
    //     $query = DB::table('tbl_surma')
    //     ->WHERE('kode_surat', '=', $kode_surat)
    //     ->first();
    //     return $query;
    // }

    // public function update_surma($data, $kode_surat)
    // {
    //     $query = DB::table('tbl_surma')
    //     ->WHERE('kode_surat', $kode_surat)
    //     ->update($data);
    //     return $query;
    // }

    // public function hapus_surma($kode_surat)
    // {
    //     $query = DB::table('tbl_surma')
    //         ->where('kode_surat', $kode_surat)
    //         ->delete();
    //     return $query;
    // }

}
