<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'pasien';

    // Kolom primary key yang digunakan oleh model ini
    protected $primaryKey = 'id_pasien';

    // Mengaktifkan auto increment pada primary key
    public $incrementing = true;

    // Tipe data primary key
    protected $keyType = 'int';

    // Menyatakan apakah timestamps digunakan atau tidak
    public $timestamps = true;

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'nik',
        'alamat',
        'telepon',
        'email',
        'tanggal_pendaftaran',
    ];
}
