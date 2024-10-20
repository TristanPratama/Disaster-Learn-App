<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodatas';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'usia',
        'jenis_kelamin',
        'alamat',
        'hp',
        'institusi',
        'jenis_anggota',
        'p1',
        'p2',
        'p3',
        'nilai_pre',
        'nilai_post',
        'user_id'
    ];
}
