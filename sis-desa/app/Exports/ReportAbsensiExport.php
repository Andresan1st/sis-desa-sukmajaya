<?php

namespace App\Exports;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;
// class ReportAbsensiExport implements FromCollection
class ReportAbsensiExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($tahun,$bulan)
    {
        $this->tahun=$tahun;
        $this->bulan=$bulan;
    }

    use Exportable;

    public function query(){
        return db::table('mas_absen')
        ->leftJoin("tb_pegawai as pg","mas_absen.nip","pg.nip")
        ->whereMonth('tanggal', $this->bulan)
        ->whereYear('tanggal', $this->tahun)
        ->orderBy('tanggal','asc')
        ->selectRaw("mas_absen.nip,pg.nip,pg.nama,mas_absen.jam_masuk,mas_absen.jam_keluar,mas_absen.tanggal");
        // ->get();
    }

    public function map($row): array{
    
        return [
            $row->nama,
            $row->jam_masuk,
            $row->jam_keluar,
        ];
    }

    public function headings(): array{
        return [
            "Nama",
            "Jam Masuk",
            "Jam Pulang"
        ];
    }

}
