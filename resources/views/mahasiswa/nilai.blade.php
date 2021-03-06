@extends('mahasiswa.layout')

@section('content')
<div class="container mt-3">
    <div class="text-center">
        <h4>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h4>
    </div>
    <h2 class="text-center mt-4 mb-5">KARTU HASIL STUDI (KHS)</h2>
    <div class="row">
        <div class="col">
            <strong>Name: </strong> {{$nilai->mahasiswa->nama}}<br>
            <strong>NIM: </strong> {{$nilai->mahasiswa->nim}}<br>
            <strong>Class: </strong> {{$nilai->mahasiswa->kelas->nama_kelas}}
        </div>
        <div class="col d-flex justify-content-end align-items-end">
            <a href="{{ route('cetak_khs', $nilai->mahasiswa->id_mahasiswa) }}" class="btn btn-primary">Cetak PDF</a>
        </div>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Semester</th>
                <th scope="col">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilai as $ni)
            <tr>
                <td>{{$ni->matakuliah->nama_matkul}}</td>
                <td>{{$ni->matakuliah->sks}}</td>
                <td>{{$ni->matakuliah->semester}}</td>
                <td>{{$ni->nilai}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-success">Kembali</a>
</div>
@endsection 