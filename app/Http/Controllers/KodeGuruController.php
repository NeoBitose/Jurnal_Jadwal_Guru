<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapelModel;
use App\Models\GuruModel;
use App\Models\KodeGuruModel;
use App\Models\JurusanModel;
use App\Models\JadwalModel;
use App\Models\JurnalModel;

class KodeGuruController extends Controller
{
	public function addkode()
	{
		$mapel = MapelModel::all();
		$guru = GuruModel::all();
		return view('admin.kodeguru.addkodeguru', compact('mapel', 'guru'));
	}

	public function createkode()
	{
		request()->validate([
			'kode_guru' => 'unique:kode_guru',
			'mapel_id' => 'required',
			'guru_id' => 'required'
		], [
			'kode_guru.unique' => 'kode guru sudah dipakai',
			'mapel_id.required' => 'mapel wajib diisi',
			'guru_id.required' => 'guru wajib diisi'
		]);

		$data = [
			'kode_guru' => request()->kode_guru,
			'guru_id' => request()->guru_id,
			'mapel_id' => request()->mapel_id,
		];

		KodeGuruModel::create($data);

		return redirect('/kodeguru');
	}

	public function editkode($id)
	{
		$mapel = MapelModel::all();
		$guru = GuruModel::all();
		$getkode = KodeGuruModel::join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
			->join('mapel', 'kode_guru.mapel_id', '=', 'mapel.id_mapel')
			->where('id_kode_guru', $id)->first();
		return view('admin.kodeguru.editkodeguru', compact('getkode', 'mapel', 'guru'));
	}

	public function updatekode($id)
	{
		$getkode = KodeGuruModel::where('id_kode_guru', $id)->first();

		if (request()->kode_guru == $getkode->kode_guru) {

			request()->validate([
				'mapel_id' => 'required',
				'guru_id' => 'required'
			], [
				'mapel_id.required' => 'mapel wajib diisi',
				'guru_id.required' => 'guru wajib diisi'
			]);

			$data = [
				'kode_guru' => request()->kode_guru,
				'guru_id' => request()->guru_id,
				'mapel_id' => request()->mapel_id,
			];

			KodeGuruModel::where('id_kode_guru', $id)->update($data);
			return redirect('/kodeguru');
		} else {

			request()->validate([
				'kode_guru' => 'unique:kode_guru',
				'mapel_id' => 'required',
				'guru_id' => 'required'
			], [
				'kode_guru.unique' => 'kode guru sudah dipakai',
				'mapel_id.required' => 'mapel wajib diisi',
				'guru_id.required' => 'guru wajib diisi'
			]);

			$data = [
				'kode_guru' => request()->kode_guru,
				'guru_id' => request()->guru_id,
				'mapel_id' => request()->mapel_id,
			];

			KodeGuruModel::where('id_kode_guru', $id)->update($data);
			return redirect('/kodeguru');
		}
	}

	public function deletekode($id)
	{
		KodeGuruModel::join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
			->where('guru.id_guru', $id)
			->update(['status_kode' => 'nonaktif']);

		JadwalModel::join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
			->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
			->where('guru.id_guru', $id)
			->update(['status_jadwal' => 'nonaktif']);

		JurnalModel::join('jadwal', 'jurnal.jadwal_id', '=', 'jadwal.id_jadwal')
			->join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
			->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')
			->where('guru.id_guru', $id)
			->update(['status_jurnal' => 'nonaktif']);
	}
}
