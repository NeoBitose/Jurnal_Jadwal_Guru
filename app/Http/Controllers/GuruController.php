<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;
use App\Models\KodeGuruModel;
use App\Models\JadwalModel;
use App\Models\JurnalModel;
use Illuminate\Support\Facades\Hash;
use DB;

class GuruController extends Controller
{
	public function index()
	{

		return view('guru.index', [

			'jam' =>  Db::table('jadwal')->join('kode_guru', 'jadwal.kode_guru_id', '=', 'kode_guru.id_kode_guru')
						->join('guru', 'kode_guru.guru_id', '=', 'guru.id_guru')->where('id_guru', session()->get('id_guru'))->count(),
			'jurnal' => 0,
		]);
	}

	public function addguru()
	{
		return view('admin.guru.addguru');
	}

	public function aktifguru($id) {

		GuruModel::where('id_guru', $id)->update(['status_guru' => 'aktif']);
		return redirect('/nondataguru');
	}

	public function createguru()
	{
		request()->validate([
			'nip' => 'min:18|max:18',
			'password' => 'min:8',
		], [
			'nip.min' => 'panjang nip 18 karakter',
			'nip.max' => 'panjang nip 18 karakter',
			'password.min' => 'password minimal 8 karakter'
		]);

		$data = [
			'nip' => request()->nip,
			'nama_guru' => request()->nama,
			'username' => request()->username,
			'password' => Hash::make(request()->password)
		];

		GuruModel::create($data);

		return redirect('/dataguru');
	}

	public function editguru($id)
	{
		$getguru = GuruModel::where('id_guru', $id)->first();
		return view('admin.guru.editguru', compact('getguru'));
	}

	public function updateguru($id)
	{

		if (request()->password != "" || request()->passwordnew != "") {

			request()->validate([
				'nip' => 'min:18|max:18',
				'password' => 'required|min:8',
				'passwordnew' => 'required|min:8',
			], [
				'nip.min' => 'panjang nip 18 karakter',
				'nip.max' => 'panjang nip 18 karakter',
				'password.required' => 'mengubah password, password wajib diisi',
				'password.min' => 'password minimal 8 karakter',
				'passwordnew.required' => 'mengubah password, password wajib diisi',
				'passwordnew.min' => 'password minimal 8 karakter',
			]);

			$data = GuruModel::where('id_guru', $id)->first();

			if (Hash::check(request()->password, $data->password)) {

				$dataguru = [
					'nip' => request()->nip,
					'nama_guru' => request()->nama,
					'username' => request()->username,
					'password' => Hash::make(request()->passwordnew),
				];

				GuruModel::where('id_guru', $id)->update($dataguru);
				return redirect('/dataguru');
			} else {
				return redirect('/editguru/' . $id);
			}
		} else {

			request()->validate([
				'nip' => 'min:18|max:18',
			], [
				'nip.min' => 'panjang nip 18 karakter',
				'nip.max' => 'panjang nip 18 karakter',
			]);

			$dataGuru = [
				'nip' => request()->nip,
				'nama_guru' => request()->nama,
				'username' => request()->username,
			];

			GuruModel::where('id_guru', $id)->update($dataGuru);
			return redirect('/dataguru');
		}
	}

	public function deleteguru($id)
	{
		GuruModel::where('id_guru', $id)->update(['status_guru' => 'nonaktif']);

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

		return redirect('/dataguru');
	}
}
