@extends('mahasiswa.layout')
 
@section('content')
 
<div class="container mt-5">
 
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
             Edit Mahasiswa
            </div>
        <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif
        <form method="post" action="{{ route('mahasiswa.update', $Mahasiswa->nim) }}" enctype="multipart/form-data" id="myForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Nim">Nim</label> 
            <input type="text" name="Nim" class="form-control" id="Nim" value="{{ $Mahasiswa->nim }}" aria-describedby="Nim" > 
        </div>
        <div class="form-group">
            <label for="Nama">Nama</label> 
            <input type="text" name="Nama" class="form-control" id="Nama" value="{{ $Mahasiswa->nama }}" aria-describedby="Nama" > 
        </div>
        <div class="form-group">
            <label for="Kelas">Kelas</label>
            <select class="form-control" name="Kelas">
                @foreach($kelas as $kls)
                    <option value="{{$kls->id}}" {{ $Mahasiswa->kelas_id
                    == $kls->id ? 'selected' : '' }}>{{$kls->nama_kelas}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Jurusan">Jurusan</label> 
            <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" value="{{ $Mahasiswa->jurusan }}" aria-describedby="Jurusan" > 
        </div>
        <div class="form-group">
            <label for="Kelamin">Jenis Kelamin</label> 
            <input type="Kelamin" name="Kelamin" class="form-control" id="Kelamin" value="{{ $Mahasiswa->kelamin }}" aria-describedby="Kelamin" > 
        </div>
        <div class="form-group">
            <label for="Email">Email</label> 
            <input type="email" name="Email" class="form-control" id="Email" value="{{ $Mahasiswa->email }}" aria-describedby="Email" > 
        </div>
        <div class="form-group">
            <label for="Alamat">Alamat</label> 
            <input type="Alamat" name="Alamat" class="form-control" id="Alamat" value="{{ $Mahasiswa->alamat }}" aria-describedby="Alamat" > 
        </div>
        <div class="form-group">
            <label for="Lahir">Tanggal Lahir</label> 
            <input type="date" name="Lahir" class="form-control" id="Lahir" value="{{ $Mahasiswa->lahir }}" aria-describedby="Lahir" > 
        </div>
        <div class="form-group">
            <label for="Foto" class="form-label">Foto</label>
            <div class="d-flex align-items-center">
                <img width="60px" class="rounded mx-auto d-block" src="{{ $Mahasiswa->foto==''? asset('images/default.png'): asset('storage/'.$Mahasiswa->foto) }}" alt="">
                <input class="form-control" style="margin-left: 5px;" type="file" id="Foto" name="Foto" value="{{ $Mahasiswa->foto }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
     </div>
    </div>
 </div>
</div>

@endsection