<?php

namespace App\Exports;

use App\Models\Spp;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SppExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Spp::all();
        return collect(Spp::getAllspp());
    }

    public function headings():array{
        return[
            'id',
            'nama',
            'tgl_pembayaran',
            'jumlah',
        ];
    }
}
