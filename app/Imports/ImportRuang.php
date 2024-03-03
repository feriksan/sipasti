<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\RuangModel;

class ImportRuang implements ToCollection
{
    public function __construct()
    {
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
                'kode_ruang' => $baris[0],
                'nama_ruang' => $baris[1],
                'unit_pengampu' => $baris[2],
                'bidang_pengampu' => $baris[3],
                'wadir_pengampu' => $baris[4],
            ];
            $this->RuangModel->simpan_ruang($data);
        }
    }
}
