@extends('mahasiswa.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>

            <!-- Start kode untuk form pencarian -->
            <form class="form" method="get" action="{{ route('search') }}">
                <div class="float-left my-2">
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan Keyword..." value="{{request('search')}}">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </form>
            <!-- Start kode untuk form pencarian -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-error">
            <p>{{ $message }}</p>
            </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th width="50px">Foto</th>
            <th width="320px">Action</th>
        </tr>
        @foreach ($paginate as $mhs)
        <tr>

            <td>{{ $mhs ->nim }}</td>
            <td>{{ $mhs ->nama }}</td>
            <td>{{ $mhs ->kelas->nama_kelas }}</td>
            <td>{{ $mhs ->jurusan }}</td>
            <td>{{ $mhs ->kelamin }}</td>
            <td>{{ $mhs ->email }}</td>
            <td>{{ $mhs ->alamat }}</td>
            <td>{{ $mhs ->lahir }}</td>
            <td><img width="50px" class="rounded mx-auto d-block" src="{{ $mhs->foto==''? asset('images/default.png'): asset('storage/'.$mhs->foto) }}" alt=""></td>
            <td>
            <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">

                <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
                <a class="btn btn-warning" href="{{ route('mahasiswa.nilai',$mhs->id_mahasiswa) }}">Nilai</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
        </tr>
    @endforeach
    </table>
    <div class="d-flex justify-content-end">
        {{$paginate->links()}}
    </div>
    
    
@endsection