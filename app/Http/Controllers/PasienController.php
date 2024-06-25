<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    // Menampilkan daftar pasien
    public function index()
    {
        $pasien = Pasien::all();
        return view('content.home', ['pasien' => $pasien]);
    }

    // Menyimpan data pasien baru atau memperbarui data pasien yang ada
    public function save(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|max:10',
            'nik' => 'required|size:16|unique:pasien,nik,' . $request->id_pasien . ',id_pasien',
            'alamat' => 'required|max:255',
            'telepon' => 'nullable|max:20',
            'email' => 'nullable|email|max:100',
            'tanggal_pendaftaran' => 'required|date',
        ]);

        // Jika id_pasien ada, berarti ini adalah update
        if ($request->id_pasien) {
            $pasien = Pasien::find($request->id_pasien);
            if ($pasien) {
                $pasien->update($request->all());
                $message = 'Data pasien berhasil diperbarui.';
            } else {
                $message = 'Data pasien tidak ditemukan.';
            }
        } else {
            Pasien::create($request->all());
            $message = 'Pasien berhasil ditambahkan.';
        }

        return redirect()->route('pasien.index')->with('success', $message);
    }

    // Menghapus data pasien dari database
    public function destroy($id_pasien)
    {
        $pasien = Pasien::find($id_pasien);
        if ($pasien) {
            $pasien->delete();
            $message = 'Data pasien berhasil dihapus.';
        } else {
            $message = 'Data pasien tidak ditemukan.';
        }

        return redirect()->route('pasien.index')->with('success', $message);
    }
}
