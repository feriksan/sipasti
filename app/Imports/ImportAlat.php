<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\AlatMesinModel;
use App\Models\RuangModel;

class ImportAlat implements ToCollection
{
    public function __construct()
    {
        $this->AlatMesinModel = new AlatMesinModel();
        $this->RuangModel = new RuangModel();
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
                'reg_barang' => $baris[0],
                'kode_barang' => $baris[1],
                'nama_barang' => $baris[2],
                'no_pabrik' => $baris[3],
                'no_rangka' => $baris[4],
                'no_mesin' => $baris[5],
                'no_polisi' => $baris[6],
                'no_bpkb' => $baris[7],
                'tgl_perolehan' => date('Y-m-d', strtotime($baris[8])),
                'tgl_pembukuan' => date('Y-m-d', strtotime($baris[9])),
                'asal_barang' => $baris[10],
                'nilai_perolehan' => $baris[11],
                'keterangan' => $baris[12],
                'no_kontrak' => $baris[13],
                'kondisi' => $baris[14],
                'nilai_buku' => $baris[15],
            ];
            $this->AlatMesinModel->simpan_alat($data);
        }
    }
}
