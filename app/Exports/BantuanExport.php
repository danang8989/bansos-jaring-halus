<?php

namespace App\Exports;

use App\Models\Bantuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\{WithMapping, WithStyles, WithHeadings};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class BantuanExport implements FromCollection, WithHeadings, WithMapping, withStyles
{
    private $date_from, $until_date;

    public function ___construct($q_date_from, $q_until_date){
        $this->date_from = $q_date_from;
        $this->until_date = $q_until_date;
    }

    public function headings(): array
    {
        return ['id', 'Nama', 'No. KK', 'No. NIK', 'Umur', 'Pendidikan Terakhir', 'Penghasilan Perbulan', 'Pekerjaan', 'Disabilitas', 'Jenis Bantuan', 'Tanggal Penyaluran'];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    { 
        // 01 - 02 - 2025 < 03 - 02 - 2025
        return Bantuan::get();
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], // Warna teks putih
                  'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '4CAF50']]], // Warna hijau
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->penduduk->nama,
            $row->penduduk->no_kk,
            $row->penduduk->nik,
            $row->penduduk->umur,
            $row->penduduk->pendidikan_terkahir,
            $row->getPenghasilanPerbulan($row->penduduk_id),
            $row->getPekerjaan($row->penduduk_id),
            $row->penduduk->disabilitas == 1 ? 'Ya' : 'Tidak',
            $row->jenisBantuan->nama,
            \Carbon\Carbon::parse($row->tanggal_penyaluran)->format('d-m-Y'),
        ];
    }
}
