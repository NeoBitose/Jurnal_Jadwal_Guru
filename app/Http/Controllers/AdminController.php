<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;
use App\Models\KodeGuruModel;
use App\Models\JadwalModel;
use App\Models\MapelModel;
use App\Models\JurnalModel;
use App\Models\JurusanModel;

class AdminController extends Controller
{
	public function index()
	{
		$guru = GuruModel::count();
		$kode = KodeGuruModel::count();
		$mapel = MapelModel::count();
		$jurusan = JurusanModel::count();
		return view('admin.homeadmin', compact('guru', 'kode', 'mapel', 'jurusan'));
	}

	public function dataguru()
	{
		$getguru = GuruModel::where('status_guru', 'aktif')->get();
		$status = true;
		return view('admin.guru.dataguru', compact('getguru', 'status'));
	}

	public function nondataguru()
	{
		$getguru = GuruModel::where('status_guru', 'nonaktif')->get();
		$status = false;
		return view('admin.guru.dataguru', compact('getguru', 'status'));
	}

	public function kodeguru()
	{
		$getkode = KodeGuruModel::join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
			->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
			->where('guru.status_guru', 'aktif')
			->where('status_kode', 'aktif')
			->orderBy('kode_guru', 'asc')
			->get();
		return view('admin.kodeguru.kodeguru', compact('getkode'));
	}

	public function jadwal()
	{
		$kelas = false;
		$getjurusan = JurusanModel::all();
		return view('admin.jadwal.jadwal', compact('getjurusan', 'kelas'));
	}

	public function mapel()
	{
		$getmapel = MapelModel::all();
		return view('admin.mapel.mapel', compact('getmapel'));
	}

	public function jurnal()
	{
		$getjurnal = JurnalModel::join('jadwal', 'jurnal.jadwal_id', '=', 'jadwal.id_jadwal')
			->join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
			->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
			->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
			->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
			->where('jurnal.tanggal','=', date('Y-m-d'))
			->where('status_guru', 'aktif')
			->where('status_jurnal', 'aktif')
			->get();

		return view('admin.jurnal.jurnal', compact('getjurnal'));
	}

	public function nonjurnal()
	{
		$getjurnal = JurnalModel::join('jadwal', 'jurnal.jadwal_id', '=', 'jadwal.id_jadwal')
		->join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
		->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
		->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
		->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')		
		->where('status_guru', 'nonaktif')
		->get();

		return view('admin.jurnal.nonjurnal', compact('getjurnal'));
	}

	public function jurusan()
	{
		$getjurusan = JurusanModel::all();
		return view('admin.jurusan.jurusan', compact('getjurusan'));
	}
}
