<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PeminjamanExport implements withHeadings, WithMapping, FromCollection
{
    protected $laporanList;

    public function __construct($laporanList)
    {
        $this->laporanList = $laporanList;
    }

    public function headings(): array
    {
        return [
            'ID Peminjaman',
            'Peminjam',
            'Buku',
            'Jumlah Pinjam',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Tanggal Kembali Fisik',
            'Status',
            'Created By',
            'Updated By',
        ];
    }

    public function collection()
    {
        return $this->laporanList;
    }

    public function map($laporanList): array
    {
        return [
            $laporanList->peminjaman_id,
            $laporanList->user->name,
            $laporanList->buku->judul,
            $laporanList->jumlah_pinjam,
            $laporanList->tanggal_pinjam,
            $laporanList->tanggal_kembali,
            $laporanList->tanggal_kembali_fisik,
            $laporanList->status,
            $laporanList->createdBy->name,
            $laporanList->updatedBy->name
        ];
    }
}
