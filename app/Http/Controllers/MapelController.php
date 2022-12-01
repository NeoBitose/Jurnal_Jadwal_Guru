<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapelModel;

class MapelController extends Controller
{
    public function addmapel()
	{
		return view('admin.mapel.addmapel');
	}

	public function createmapel()
	{		

		$data = [   			
			'nama_mapel' => request()->nama,					
		];

		MapelModel::create($data);	
		return redirect('/mapel');
	}

	public function editmapel($id)
	{
		$getmapel = MapelModel::where('id_mapel', $id)->first();
		return view('admin.mapel.editmapel', compact('getmapel'));
	}

	public function updatemapel($id)
	{
		$data = [   			
			'nama_mapel' => request()->nama,					
		];

		MapelModel::where('id_mapel', $id)->update($data);	
		return redirect('/mapel');
	}

	public function deletemapel($id)
	{
		MapelModel::where('id_mapel', $id)->delete();	
		return redirect('/mapel');
	}
}
