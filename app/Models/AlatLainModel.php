<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlatLainModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_pejabat';
    protected $fillable = [
        'kode_pejabat',
        'nama_pejabat',
    ];

    const CREATED_AT = 'created_at';
    const UPDATE_AT = 'updated_at';


    public function pejabat()
    {
        $query = DB::table('tbl_pejabat')
            ->where('kode_pejabat', 'NOT LIKE','PJ-01')
            ->select('tbl_pejabat.*')
            ->get();
        return $query;
    }

    public function pejabat1()
    {
        $query = DB::table('tbl_pejabat')
            ->SELECT('tbl_pejabat.*')
            ->GET();
        return $query;
    }

    public function kode_otomatis()
    {
        $query = DB::table('tbl_pejabat')
        ->select(DB::raw('RIGHT(tbl_pejabat.kode_pejabat,2) as kode_pejabat', FALSE))
        ->orderBy('kode_pejabat', 'DESC')
        ->limit(1)
        ->get();
        if ($query->count() <> 0) {
            $data = $query->first();
            $kode_baru = intval($data->kode_pejabat) + 1;
        } else {
            $kode_baru = 1;
        }
        $nomorUrut = str_pad($kode_baru, 2, "0", STR_PAD_LEFT);
        return "PJ-". $nomorUrut;
    }


    public function tambah_pejabat($data)
    {
        $query = DB::table('tbl_pejabat')
            ->insert($data);
        return $query;
    }


    public function buka_pejabat($kode_pejabat)
    {
        $query = DB::table('tbl_pejabat')
        ->WHERE('kode_pejabat', '=', $kode_pejabat)
        ->first();
        return $query;
    }


    public function update_pejabat($data, $kode_pejabat)
    {
        $query = DB::table('tbl_pejabat')
        ->WHERE('kode_pejabat', $kode_pejabat)
        ->update($data);
        return $query;
    }

    
    public function hapus_pejabat($kode_pejabat)
    {
        $query = DB::table('tbl_pejabat')
            ->where('kode_pejabat', $kode_pejabat)
            ->delete();
        return $query;
    }
}
