<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JurnalModel;

class JurnalController extends Controller
{
    public function filjurnal()
    {
        $getjurnal = JurnalModel::join('jadwal', 'jurnal.jadwal_id', '=', 'jadwal.id_jadwal')
            ->join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
            ->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
            ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
            ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
            ->where('status_guru', 'aktif')
            ->whereBetween('jurnal.tanggal', [request()->dari, request()->sampai])
            ->get();

        return view('admin.jurnal.jurnal', compact('getjurnal'));
    }

    public function filnonjurnal()
    {
        $getjurnal = JurnalModel::join('jadwal', 'jurnal.jadwal_id', '=', 'jadwal.id_jadwal')
            ->join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
            ->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
            ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
            ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
            ->where('status_guru', 'nonaktif')
            ->whereBetween('jurnal.tanggal', [request()->dari, request()->sampai])
            ->get();

        return view('admin.jurnal.nonjurnal', compact('getjurnal'));
    }

    public function detailjurnal($id)
    {
        $getjurnal = JurnalModel::join('jadwal', 'jurnal.jadwal_id', '=', 'jadwal.id_jadwal')
            ->join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
            ->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
            ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
            ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
            ->where('id_jurnal', $id)
            ->first();

        return view('admin.jurnal.detailjurnal', compact('getjurnal'));
    }
}
