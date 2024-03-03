<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GedungBangunanModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_surke';
    protected $fillable = [
        'kode_surat',
        'tgl_keluar',
        'no_surat',
        'tgl_surat',
        'jenis_surat',
        'nama_surat',
        'perihal',
        'tujuan',
        'sifat',
        'file',
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


    public function tampil_surke()
    {
        $today = Carbon::today();
        $query = DB::table('tbl_surke')
            ->whereDate('tgl_keluar', '=', $today)
            ->GET();
        return $query;
    }


    public function data_surke($tgl_awal, $tgl_akhir)
    {
        $query = DB::table('tbl_surke')
            ->whereBetween('tgl_keluar', [$tgl_awal, $tgl_akhir])
            ->GET();
        return $query;
    }


    public function kode_otomatis1()
    {
        $query = DB::table('tbl_surke')
        ->select(DB::raw('RIGHT(tbl_surke.kode_surat,4) as kode_surat', FALSE))
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
        return "SK-". date("Y") . $nomorUrut;
    }


    public function kode_otomatis2()
    {
        $query = DB::table('tbl_surke')
        ->select(DB::raw('RIGHT(tbl_surke.kode_surat,4) as kode_surat', FALSE))
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

    public function tambah_surke($data)
    {
        $query = DB::table('tbl_surke')
            ->insert($data);
        return $query;
    }


    public function buka_surke($kode_surat)
    {
        $query = DB::table('tbl_surke')
        ->WHERE('kode_surat', '=', $kode_surat)
        ->first();
        return $query;
    }

    public function update_surke($data, $kode_surat)
    {
        $query = DB::table('tbl_surke')
        ->WHERE('kode_surat', $kode_surat)
        ->update($data);
        return $query;
    }

    public function hapus_surke($kode_surat)
    {
        $query = DB::table('tbl_surke')
            ->where('kode_surat', $kode_surat)
            ->delete();
        return $query;
    }

}
