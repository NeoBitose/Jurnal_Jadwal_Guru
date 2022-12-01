<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JurusanModel;

class JurusanController extends Controller
{
    public function addjurusan()
	{
		return view('admin.jurusan.addjurusan');
	}

	public function createjurusan()
	{		

		$data = [   			
			'nama_jurusan' => request()->nama,					
		];

		JurusanModel::create($data);	
		return redirect('/jurusan');
	}

	public function editjurusan($id)
	{
		$getjurusan = JurusanModel::where('id_jurusan', $id)->first();
		return view('admin.jurusan.editjurusan', compact('getjurusan'));
	}

	public function updatejurusan($id)
	{
		$data = [   			
			'nama_jurusan' => request()->nama,					
		];

		JurusanModel::where('id_jurusan', $id)->update($data);	
		return redirect('/jurusan');
	}

	public function deletejurusan($id)
	{
		JurusanModel::where('id_jurusan', $id)->delete();	
		return redirect('/jurusan');
	}
}
