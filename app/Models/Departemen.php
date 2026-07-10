<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'kode_departemen',
        'nama_departemen',
        'deskripsi_tugas',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'department_id');
    }
}