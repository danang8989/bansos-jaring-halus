@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Penduduk</h4>
                    <p class="card-description"> Tambah Data. </p>
                    <form class="forms-sample" action="{{ route('admin.penduduk.insert') }}" method="POST">
                        @csrf @method('POST')
                        <div class="form-group form-group-sm">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="nama">
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="no_nik">No. NIK</label>
                          <input type="number" class="form-control form-control-sm" id="no_nik" name="nik" placeholder="No. NIK">
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="no_kk">No. KK</label>
                          <input type="number" class="form-control form-control-sm" id="no_kk" name="no_kk" placeholder="No. KK">
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="nama">Agama</label>
                          <select type="text" class="form-control form-control-sm" id="agama" name="agama" placeholder="Agama">
                            <option value="">-Silahkan Pilih-</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Khatolik">Kristen Khatolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="nama">Hubungan Keluarga</label>
                          <select type="text" class="form-control form-control-sm" id="hubungan_keluarga" name="hubungan_keluarga" placeholder="Hubungan Keluarga">
                            <option value="">-Silahkan Pilih-</option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Menantu">Menantu</option>
                            <option value="Cucu">Cucu</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Mertua">Mertua</option>
                            <option value="Famili Lain">Famili Lain</option>
                            <option value="Pembantu">Pembantu</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="tempat_lahir">Tempat Lahir</label>
                          <input type="text" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jenis_kelamin" id="disabilitas1" value="Laki-laki" checked>Laki-laki</label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jenis_kelamin" id="disabilitas2" value="Perempuan">Perempuan </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                          <select class="form-control form-control-sm" id="pendidikan_terakhir" name="pendidikan_terakhir" placeholder="Pendidikan Terkahir">
                            <option value="">-- Pilih Pendidikan Terakhir --</option>
                            <option value="sd">Sekolah Dasar (SD)</option>
                            <option value="smp">Sekolah Menengah Pertama (SMP)</option>
                            <option value="sma">Sekolah Menengah Atas (SMA)</option>
                            <option value="diploma">Diploma</option>
                            <option value="sarjana">Sarjana (S1)</option>
                            <option value="magister">Magister (S2)</option>
                            <option value="doktor">Doktor (S3)</option>
                          </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="umur">Umur</label>
                          <input type="number" class="form-control form-control-sm" id="umur" name="umur" placeholder="Umur">
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="dusun">Dusun</label>
                          <select class="form-control form-control-sm" id="dusun" name="dusun_id" placeholder="Dusun">
                            <option value="">-- Pilih Dusun --</option>
                            @foreach ($dusun as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 col-form-label">Disabilitas?</label>
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="disabilitas" id="disabilitas1" value="1" checked> Ya </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="disabilitas" id="disabilitas2" value="0"> Tidak </label>
                              </div>
                            </div>
                          </div>
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