<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\JadwalModel;
use App\Models\JurusanModel;
use App\Models\KodeGuruModel;
use App\Models\GuruModel;
use App\Models\MapelModel;

class JadwalController extends Controller
{
    public function filjadwal()
    {
        $getjadwal = JadwalModel::join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
            ->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
            ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
            ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
            ->get();

        $jadwalkelas[] = [
            '0' => JadwalModel::join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
                ->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
                ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
                ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
                ->where('status_guru', 'aktif')
                ->where('status_jadwal', 'aktif')
                ->where('hari', 'senin')
                ->where('kelas', request()->kelas)
                ->where('no_kelas', request()->no_kelas)
                ->where('jurusan_id', request()->jurusan)
                ->get(),
            '1' => JadwalModel::join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
                ->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
                ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
                ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
                ->where('status_guru', 'aktif')
                ->where('status_jadwal', 'aktif')
                ->where('hari', 'selasa')
                ->where('kelas', request()->kelas)
                ->where('no_kelas', request()->no_kelas)
                ->where('jurusan_id', request()->jurusan)
                ->get(),
            '2' => JadwalModel::join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
                ->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
                ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
                ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
                ->where('status_guru', 'aktif')
                ->where('status_jadwal', 'aktif')
                ->where('hari', 'rabu')
                ->where('kelas', request()->kelas)
                ->where('no_kelas', request()->no_kelas)
                ->where('jurusan_id', request()->jurusan)
                ->get(),
            '3' => JadwalModel::join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
                ->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
                ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
                ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
                ->where('status_guru', 'aktif')
                ->where('status_jadwal', 'aktif')
                ->where('hari', 'kamis')
                ->where('kelas', request()->kelas)
                ->where('no_kelas', request()->no_kelas)
                ->where('jurusan_id', request()->jurusan)
                ->get(),
            '4' => JadwalModel::join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
                ->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
                ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
                ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
                ->where('status_guru', 'aktif')
                ->where('status_jadwal', 'aktif')
                ->where('hari', 'jumat')
                ->where('kelas', request()->kelas)
                ->where('no_kelas', request()->no_kelas)
                ->where('jurusan_id', request()->jurusan)
                ->get(),
        ];

        $seminggu[] = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];

        $nomor = 1;
        $kelas = true;
        $getjurusan = JurusanModel::all();
        return view('admin.jadwal.jadwal', compact('getjurusan', 'getjadwal', 'jadwalkelas', 'seminggu', 'nomor', 'kelas'));
    }

    public function addjadwal()
    {

        $getjurusan = JurusanModel::all();
        $getkode = KodeGuruModel::join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
            ->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
            ->where('guru.status_guru', 'aktif')
            ->orderBy('kode_guru', 'asc')
            ->get();
        return view('admin.jadwal.addjadwal', compact('getjurusan', 'getkode'));
    }

    public function createjadwal()
    {

        $jadwal = JadwalModel::where('status_jadwal', 'aktif')
            ->where('hari', request()->hari)
            ->where('kelas', request()->kelas)
            ->where('no_kelas', request()->no_kelas)
            ->where('jurusan_id', request()->jurusan)
            ->get();

        // dd(request());

        for ($a = 0; $a < count($jadwal); $a++) {

            $mulai = request()->mulai . ":00";
            $akhir = request()->akhir . ":00";

            $time_mulai = Carbon::createFromFormat('H:i:s', $mulai);
            $time_db_mulai = Carbon::createFromFormat('H:i:s', $jadwal[$a]->jam_mulai);
            $time_akhir = Carbon::createFromFormat('H:i:s', $akhir);
            $time_db_akhir = Carbon::createFromFormat('H:i:s', $jadwal[$a]->jam_selesai);

            $resultmulai = $time_mulai->eq($time_db_mulai);
            $resultakhir = $time_akhir->eq($time_db_akhir);

            if ($resultmulai == true) {
                return redirect()->back();
            } elseif ($resultakhir == true) {
                return redirect()->back();
            } elseif (request()->mulai > $jadwal[$a]->jam_mulai && request()->akhir < $jadwal[$a]->jam_selesai) {
                return redirect()->back();
            } elseif (request()->mulai < $jadwal[$a]->jam_mulai && request()->akhir > $jadwal[$a]->jam_selesai) {
                return redirect()->back();
            } elseif (request()->mulai > $jadwal[$a]->jam_mulai && request()->mulai < $jadwal[$a]->jam_selesai) {
                return redirect()->back();
            } elseif (request()->akhir > $jadwal[$a]->jam_mulai && request()->akhir < $jadwal[$a]->jam_selesai) {
                return redirect()->back();
            }
        }

        $data = [
            'kelas' => request()->kelas,
            'jurusan_id' => request()->jurusan,
            'no_kelas' => request()->no_kelas,
            'kode_guru_id' => request()->kode_guru,
            'hari' => request()->hari,
            'jam_mulai' => request()->mulai,
            'jam_selesai' => request()->akhir
        ];

        JadwalModel::insert($data);
        return redirect('/jadwal');
    }

    public function editjadwal()
    {
    }

    public function updatejadwal()
    {
    }

    public function deletejadwal()
    {
    }
}
