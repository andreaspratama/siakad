@extends('layouts.admin.admin')

@section('title')
    Tambah Data Siswa Tinggal Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Siswa Tinggal Kelas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('tinggalkelas.store')}}" method="POST">
              @csrf
                <label for="thnakademik_id">Tahun Akademik</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="thnakademik_id"><i class="fas fa-user"></i></span>
                  </div>
                  <select class="custom-select" name="thnakademik_id" required>
                    <option>-- Pilih Akademik --</option>
                    @foreach ($thnakads as $thn)
                        <option value="{{$thn->id}}">
                          {{$thn->tahun_akademik}} / {{$thn->semester}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="nisn">Nisn</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="nisn"><i class="far fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN" name="nisn" value="{{old('nisn')}}">
                    @error('nisn')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="nama"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama" value="{{old('nama')}}">
                    @error('nama')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                    <label for="asal_kls">Asal Kelas</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="asal_kls"><i class="fas fa-user-graduate"></i></label>
                      </div>
                      <select class="custom-select" name="asal_kls">
                        <option>-- Pilih --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgl_kls">Tinggal Kelas</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="tgl_kls"><i class="fas fa-user-graduate"></i></label>
                      </div>
                      <select class="custom-select" name="tgl_kls">
                        <option>-- Pilih --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="alasan">Alasan</label>
                  <textarea class="form-control" name="alasan" rows="3" placeholder="Alasan"></textarea>
                </div>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
              <button type="reset" class="btn btn-warning btn-sm">Reset</button>
              <a href="{{route('tinggalkelas.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection