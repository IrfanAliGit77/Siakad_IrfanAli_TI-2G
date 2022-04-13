<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey = 'id_mahasiswa'; // Memanggil isi DB Dengan primarykey
 /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
    protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'jurusan',
        'kelamin',
        'email',
        'alamat',
        'lahir',
    ];

    protected $perPage = 5;

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}