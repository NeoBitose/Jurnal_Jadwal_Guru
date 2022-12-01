<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminModel;
use App\Models\GuruModel;

class AuthController extends Controller
{

	public function adminlogin()
	{
		if (session('logged_in')) {

			if (session()->get('role') != 'admin') {
				return abort(404);

			} else {
				return redirect('/admin');
			}
		}

		return view('auth.loginadmin');
	}

	public function gurulogin()
	{
		if (session('logged_in')) {

			if (session()->get('role') != 'guru') {
				return abort(404);

			} else {
				return redirect('/guru');
			}
		}

		return view('auth.loginguru');
	}

	public function authadmin()
	{
		if (!session('logged_in')) {

			request()->validate([
				'username' => 'required',
				'password' => 'required|min:8',
			], [
				'username.required' => 'username mohon diisi',
				'password.required' => 'password mohon diisi',
				'password.min' => 'password minimal 8 karakter',
			]);

			$data = AdminModel::where('username', request()->username)->first();

			if ($data) {
				
				if (Hash::check(request()->password, $data['password'])) {
					session()->put([
						'id_admin' => $data['id_user'],
						'username' => $data['username'],
						'role' => "admin",
						'logged_in' => 	true,
					]);

					return redirect('/admin');

				} else {
					return redirect('/loginadmin');
				}
				
			} else {
				return redirect('/loginadmin');
			}
		}

		elseif (session()->get('role') == 'admin') {
            return redirect('/admin');            
        } 

        else {
			return abort(404);
		}
	}

	public function authguru()
	{
		if (!session('logged_in')) {

			request()->validate([
				'username' => 'required',
				'password' => 'required|min:8',
			], [
				'username.required' => 'username mohon diisi',
				'password.required' => 'password mohon diisi',
				'password.min' => 'password minimal 8 karakter',
			]);

			$data = GuruModel::where('username', request()->username)->first();

			if ($data) {
				
				if (Hash::check(request()->password, $data['password'])) {
					session()->put([
						'id_guru' => $data['id_guru'],
						'username' => $data['username'],
						'nip' => $data['nip'],
						'role' => "guru",
						'logged_in' => 	true,
					]);

					return redirect('/guru');

				} else {
					return redirect('/loginguru');
				}
				
			} else {
				return redirect('/loginguru');
			}
		} 

		elseif (session()->get('role') == 'guru') {
            return redirect('/guru');            
        } 

		else {
			return abort(404);
		}
	}	

	public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
