<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeGuruModel extends Model
{
    use HasFactory;

    protected $table = 'kode_guru';
    protected $guarded = ['id_kode_guru'];
}
