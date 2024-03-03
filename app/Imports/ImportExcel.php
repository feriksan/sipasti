<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\TanahModel;

class ImportExcel implements ToCollection
{
    public function __construct()
    {
        $this->TanahModel = new TanahModel();
    }
    /**
    * @param Collection $collection
    */

    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $baris) {
            if ($key == 0) {
                continue;
            }
            $data = [
                'kode_barang' => $baris[0],
                'reg_barang' => $baris[1],
                'jenis_barang' => $baris[2],
                'luas' => $baris[3],
                'tahun_beli' => $baris[4],
                'alamat' => $baris[5],
                'status_hak' => $baris[6],
                'tgl_sertifikat' => $baris[7],
                'no_sertifikat' => $baris[8],
                'penggunaan' => $baris[9],
                'asal_barang' => $baris[10],
                'nilai_perolehan' => $baris[11],
                'keterangan' => $baris[12],
            ];
            $this->TanahModel->simpan_tanah($data);
        }
    }
}
