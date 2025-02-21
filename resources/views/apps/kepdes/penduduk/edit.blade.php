@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Penduduk</h4>
                    <p class="card-description"> Edit Data. </p>
                    <form class="forms-sample" action="{{ route('admin.penduduk.update') }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $penduduk->id }}">
                        <div class="form-group form-group-sm">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="nama" value="{{ $penduduk->nama }}" name="nama" placeholder="nama">
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="no_nik">No. NIK</label>
                          <input type="number" class="form-control form-control-sm" id="no_nik" value="{{ $penduduk->nik }}" name="nik" placeholder="No. NIK">
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="no_kk">No. KK</label>
                          <input type="number" class="form-control form-control-sm" id="no_kk" value="{{ $penduduk->no_kk }}" name="no_kk" placeholder="No. KK">
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="nama">Agama</label>
                          <select type="text" class="form-control form-control-sm" id="agama" name="agama" placeholder="Agama">
                            <option value="">-Silahkan Pilih-</option>
                            <option value="Islam" @if ($penduduk->agama == "Islam") selected @endif>Islam</option>
                              <option value="Kristen Khatolik" @if ($penduduk->agama == "Kristen Khatolik") selected @endif>Kristen Khatolik</option>
                              <option value="Kristen Protestan" @if ($penduduk->agama == "Kristen Protestan") selected @endif>Kristen Protestan</option>
                              <option value="Budha" @if ($penduduk->agama == "Budha") selected @endif>Budha</option>
                              <option value="Hindu" @if ($penduduk->agama == "Hindu") selected @endif>Hindu</option>
                              <option value="Konghucu" @if ($penduduk->agama == "Konghucu") selected @endif>Konghucu</option>
                              <option value="Lainnya" @if ($penduduk->agama == "Lainnya") selected @endif>Lainnya</option>
                          </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="nama">Hubungan Keluarga</label>
                          <select type="text" class="form-control form-control-sm" id="hubungan_keluarga" name="hubungan_keluarga" placeholder="Hubungan Keluarga">
                            <option value="">-Silahkan Pilih-</option>
                            <option value="Kepala Keluarga" @if ($penduduk->hubungan_keluarga == "Kepala Keluarga") selected @endif>Kepala Keluarga</option>
                            <option value="Suami" @if ($penduduk->hubungan_keluarga == "Suami") selected @endif>Suami</option>
                            <option value="Istri" @if ($penduduk->hubungan_keluarga == "Istri") selected @endif>Istri</option>
                            <option value="Anak" @if ($penduduk->hubungan_keluarga == "Anak") selected @endif>Anak</option>
                            <option value="Menantu" @if ($penduduk->hubungan_keluarga == "Menantu") selected @endif>Menantu</option>
                            <option value="Cucu" @if ($penduduk->hubungan_keluarga == "Cucu") selected @endif>Cucu</option>
                            <option value="Orang Tua" @if ($penduduk->hubungan_keluarga == "Orang Tua") selected @endif>Orang Tua</option>
                            <option value="Mertua" @if ($penduduk->hubungan_keluarga == "Mertua") selected @endif>Mertua</option>
                            <option value="Famili Lain" @if ($penduduk->hubungan_keluarga == "Famili Lain") selected @endif>Famili Lain</option>
                            <option value="Pembantu" @if ($penduduk->hubungan_keluarga == "Pembantu") selected @endif>Pembantu</option>
                            <option value="Lainnya" @if ($penduduk->hubungan_keluarga == "Lainnya") selected @endif>Lainnya</option>
                          </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="tempat_lahir">Tempat Lahir</label>
                          <input type="text" class="form-control form-control-sm" id="tempat_lahir" value="{{ $penduduk->tempat_lahir }}" name="tempat_lahir" placeholder="Tempat Lahir">
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
                            <option value="smp" @if ($penduduk->pendidikan_terakhir == "smp") selected @endif>Sekolah Menengah Pertama (SMP)</option>
                            <option value="sma" @if ($penduduk->pendidikan_terakhir == "sma") selected @endif>Sekolah Menengah Atas (SMA)</option>
                            <option value="diploma" @if ($penduduk->pendidikan_terakhir == "diploma") selected @endif>Diploma</option>
                            <option value="sarjana" @if ($penduduk->pendidikan_terakhir == "sarjana") selected @endif>Sarjana (S1)</option>
                            <option value="magister" @if ($penduduk->pendidikan_terakhir == "magister") selected @endif>Magister (S2)</option>
                            <option value="doktor" @if ($penduduk->pendidikan_terakhir == "doktor") selected @endif>Doktor (S3)</option>
                          </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="umur">Umur</label>
                          <input type="number" class="form-control form-control-sm" id="umur" value="{{ $penduduk->umur }}" name="umur" placeholder="Umur">
                        </div>
                      <div class="form-group form-group-sm">
                        <label for="dusun">Dusun</label>
                        <select class="form-control form-control-sm" id="dusun" name="dusun_id" placeholder="Dusun">
                          <option value="">-- Pilih Dusun --</option>
                          @foreach ($dusun as $item)
                              <option value="{{ $item->id }}" @if ($penduduk->dusun_id == $item->id)
                                  selected
                              @endif>{{ $item->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 col-form-label">Disabilitas?</label>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="disabilitas" id="disabilitas1" value="1"
                                @if ($penduduk->disabilitas == 1)
                                    checked
                                @endif> Ya </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="disabilitas" id="disabilitas2" value="0"
                                @if ($penduduk->disabilitas == 0)
                                    checked
                                @endif> Tidak </label>
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