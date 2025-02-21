@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Klasifikasi Pekerjaan</h4>
                    <p class="card-description"> Tambah Data. </p>
                    <form class="forms-sample" action="{{ route('admin.pekerjaan.insert') }}" method="POST">
                        @csrf @method('POST')
                        <div class="form-group form-group-sm">
                            <label for="nama">Penduduk</label>
                            <select type="text" class="form-control form-control-sm" id="penduduk" name="penduduk_id" placeholder="Bahan Makanan">
                              <option value="">-Silahkan Pilih-</option>
                              @foreach ($penduduk as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} | {{ $item->nik }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="nama">Pekerjaan</label>
                          <select class="form-control form-control-sm" id="pekerjaan" name="name" placeholder="Pekerjaan">
                            <option value="">-- Pilih Pekerjaan --</option>
                            <option value="Polisi">Polisi</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Pemasaran">Pemasaran</option>
                            <option value="Pedagang Kaki Lima">Pedagang Kaki Lima</option>
                            <option value="Guru">Guru</option>
                            <option value="Dokter">Dokter</option>
                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                            <option value="Pengacara">Pengacara</option>
                            <option value="Akuntan">Akuntan</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="lainnya">Lainnya</option>
                          </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="nama">Penghasilan Perbulan</label>
                          <select class="form-control form-control-sm" id="penghasilan_perbulan" name="penghasilan_perbulan" placeholder="Penghasilan Perbulan">
                            <option value="">-- Pilih Pekerjaan --</option>
                            <option value="< Rp. 500.000"> Kurang dari Rp. 500.000 </option>
                            <option value="< Rp. 1.000.000"> Kurang dari Rp. 1.000.000 </option>
                            <option value="< Rp. 2.000.000"> Kurang dari Rp. 2.000.000 </option>
                            <option value="< Rp. 500.000"> Lebih dari Rp. 3.000.000 </option>
                            <option value="Tidak Berpenghasilan"> Tidak Berpenghasilan </option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ URL::previous() }}">
                            <button type="button" class="btn btn-light">Batal</button>
                        </a>
                    </form>
                  </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('footer-scripts')
    
@endsection