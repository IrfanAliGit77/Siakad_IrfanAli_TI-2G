<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        //$mahasiswa = Mahasiswa::all(); // Mengambil semua isi tabel sebelum relasi
        $mahasiswa = Mahasiswa::with('kelas')->get(); //sesudah relasi
        $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(5); 
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create',['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required', 
            'Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Lahir' => 'required',
            ]);

            $mahasiswa = new Mahasiswa;
            $mahasiswa->nim = $request->get('Nim');
            $mahasiswa->nama = $request->get('Nama');
            $mahasiswa->jurusan = $request->get('Jurusan');
            $mahasiswa->kelamin = $request->get('Kelamin');
            $mahasiswa->email = $request->get('Email');
            $mahasiswa->alamat = $request->get('Alamat');
            $mahasiswa->lahir = $request->get('Lahir');
            $mahasiswa->save();

            $kelas = new Kelas;
            $kelas->id = $request->get('Kelas');

            //fungsi eloquent untuk menambah data dengan relasi belongsTo
            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();

            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('mahasiswa.index')
                ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        //code sebelumm dibuat relasi --> $Mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        return view('mahasiswa.detail', ['Mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all();//mendapatkan data dari tabel kelas
        return view('mahasiswa.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Lahir' => 'required', 
            ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        $mahasiswa = Mahasiswa::with('kelas')->where('nim',$nim)->first();
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->kelamin = $request->get('Kelamin');
        $mahasiswa->email = $request->get('Email');
        $mahasiswa->alamat = $request->get('Alamat');
        $mahasiswa->lahir = $request->get('Lahir');
        $mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::where('nim', $nim)->delete();

        return redirect()->route('mahasiswa.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function nilai($id)
    {

        $nilai = Mahasiswa_MataKuliah::where('mahasiswa_id', $id)
            ->with('matakuliah')->get();

        $nilai->mahasiswa = Mahasiswa::with('kelas')
            ->where('id_mahasiswa', $id)->first();
        
        return view('mahasiswa.nilai', compact('nilai'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $paginate = Mahasiswa::with('kelas')->where('nama', 'like', "%" . $keyword . "%")
        ->orWhere('nim', 'like', "%" . $keyword . "%")
        ->orWhere('kelas->nama_kelas', 'like', "%" . $keyword . "%")
        ->orWhere('jurusan', 'like', "%" . $keyword . "%")
        ->orWhere('kelamin', 'like', "%" . $keyword . "%")
        ->orWhere('email', 'like', "%" . $keyword . "%")
        ->orWhere('alamat', 'like', "%" . $keyword . "%")
        ->orWhere('lahir', 'like', "%" . $keyword . "%")
        ->paginate(5);
        
        return view('mahasiswa.index', compact('paginate'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
};
