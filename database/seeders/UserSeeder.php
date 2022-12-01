<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminModel;
USE App\Models\GuruModel;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // AdminModel::insert([
        // 	'username' => 'admin',
        // 	'email' => 'alifrmdn@gmail.com',
        // 	'password' => Hash::make('jadwalin'),
        // ]);

        // GuruModel::insert([
        //     'nip' => 123456789123456789,
        //     'nama_guru' => 'alif ramadhan',
        //     'username' => 'guru',
        //     'password' => Hash::make('jadwalin'),
        // ]);

        // GuruModel::insert([
        //     'nip' => 123456789123456789,
        //     'nama_guru' => 'Maulana Malik',
        //     'username' => 'maulana@smakensa',
        //     'password' => Hash::make('jadwalin'),
        // ]);
        GuruModel::insert([
            'nip' => 9112345678912345678,
            'nama_guru' => 'Alif Ramadhan',
            'username' => 'alif@smakensa',
            'password' => Hash::make('jadwalin'),
        ]);
        GuruModel::insert([
            'nip' => 891234567891234567,
            'nama_guru' => 'Arsi Dwi',
            'username' => 'arsi@smakensa',
            'password' => Hash::make('jadwalin'),
        ]);
        GuruModel::insert([
            'nip' => 789123456789123456,
            'nama_guru' => 'Iqbal Roni',
            'username' => 'iqbal@smakensa',
            'password' => Hash::make('jadwalin'),
        ]);
        GuruModel::insert([
            'nip' => 678912345678912345,
            'nama_guru' => 'Ilham Nur',
            'username' => 'ilham@smakensa',
            'password' => Hash::make('jadwalin'),
        ]);
        GuruModel::insert([
            'nip' => 567891234567891234,
            'nama_guru' => 'Rayasya Dziki',
            'username' => 'rayasya@smakensa',
            'password' => Hash::make('jadwalin'),
        ]);
        GuruModel::insert([
            'nip' => 456789123456789123,
            'nama_guru' => 'Sebrina Ami',
            'username' => 'sebrina@smakensa',
            'password' => Hash::make('jadwalin'),
        ]);
        GuruModel::insert([
            'nip' => 234567891234567891,
            'nama_guru' => 'Sevri Vendrian',
            'username' => 'sevri@smakensa',
            'password' => Hash::make('jadwalin'),
        ]);
    }
}
