<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JalanIrigasiModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_surma';
    protected $fillable = [
        'kode_surat',
        'tgl_masuk',
        'no_surat',
        'tgl_surat',
        'nama_surat',
        'perihal',
        'file',
        'kode_pejabat',
        'kode_user',
        'tgl_upload',
        'tgl_update',
    ];

    const CREATED_AT = 'tgl_upload';
    const UPDATE_AT = 'tgl_update';

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


    public function tampil_surma()
    {
        $today = Carbon::today();
        $query = DB::table('tbl_surma')
            ->whereDate('tgl_masuk', '=', $today)
            ->GET();
        return $query;
    }

    public function tampil_surmaOperator($kode_pejabat)
    {
        $today = Carbon::today();
        $query = DB::table('tbl_surma')
            ->where('tujuan_disposisi1', '=', $kode_pejabat)
            ->whereDate('tgl_masuk', '=', $today)
            ->GET();
        return $query;
    }

    public function data_surma($tgl_awal, $tgl_akhir)
    {
        $query = DB::table('tbl_surma')
            ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
            ->GET();
        return $query;
    }


    public function data_surmaOp($tgl_awal, $tgl_akhir, $kode_pejabat)
    {
        $query = DB::table('tbl_surma')
            ->where('tujuan_disposisi1', '=', $kode_pejabat)
            ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
            ->GET();
        return $query;
    }


    public function klasifikasi()
    {
        $query = DB::table('tbl_kode')
        ->orderBy('no', 'ASC')
        ->get();
        return $query;
    }


    public function kode_otomatis1()
    {
        $query = DB::table('tbl_surma')
        ->select(DB::raw('RIGHT(tbl_surma.kode_surat,4) as kode_surat', FALSE))
        ->orderBy('kode_surat', 'DESC')
        ->limit(1)
        ->get();
        if ($query->count() <> 0) {
            $data = $query->first();
            $kode_baru = intval($data->kode_surat) + 1;
        } else {
            $kode_baru = 1;
        }
        $nomorUrut = str_pad($kode_baru, 4, "0", STR_PAD_LEFT);
        return "SM-". date("Y") . $nomorUrut;
    }


    public function kode_otomatis2()
    {
        $query = DB::table('tbl_surma')
        ->select(DB::raw('RIGHT(tbl_surma.kode_surat,4) as kode_surat', FALSE))
        ->orderBy('kode_surat', 'DESC')
        ->limit(1)
        ->get();
        if ($query->count() <> 0) {
            $data = $query->first();
            $kode_baru = intval($data->kode_surat) + 1;
        } else {
            $kode_baru = 1;
        }
        $nomorUrut = str_pad($kode_baru, 4, "0", STR_PAD_LEFT);
        return "/". $nomorUrut."/".  date("Y")."/RSBA";
    }


    public function tambah_surma($data)
    {
        $query = DB::table('tbl_surma')
            ->insert($data);
        return $query;
    }


    public function buka_surma($kode_surat)
    {
        $query = DB::table('tbl_surma')
        ->WHERE('kode_surat', '=', $kode_surat)
        ->first();
        return $query;
    }

    public function update_surma($data, $kode_surat)
    {
        $query = DB::table('tbl_surma')
        ->WHERE('kode_surat', $kode_surat)
        ->update($data);
        return $query;
    }

    public function update_surma1($data, $kode_surat)
    {
        $query = DB::table('tbl_surma')
        ->WHERE('kode_surat', $kode_surat)
        ->update($data);
        return $query;
    }

    public function hapus_surma($kode_surat)
    {
        $query = DB::table('tbl_surma')
            ->where('kode_surat', $kode_surat)
            ->delete();
        return $query;
    }

}
