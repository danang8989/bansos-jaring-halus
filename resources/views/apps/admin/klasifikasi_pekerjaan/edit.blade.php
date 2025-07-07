@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Klasifikasi Pekerjaan</h4>
                    <p class="card-description"> Edit Data. </p>
                    <form class="forms-sample" action="{{ route('admin.pekerjaan.update') }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $pekerjaan->id }}">
                        <div class="form-group form-group-sm">
                          <label for="nama">Penduduk</label>
                          <select type="text" class="form-control form-control-sm" id="penduduk" name="penduduk_id" placeholder="Bahan Makanan">
                            <option value="">-Silahkan Pilih-</option>
                            @foreach ($penduduk as $item)
                              <option value="{{ $item->id }}" @if ($item->id == $pekerjaan->penduduk_id) selected @endif>{{ $item->nama }} | {{ $item->nik }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group form-group-sm">
                          <label for="nama">Pekerjaan</label>
                          <select class="form-control form-control-sm" id="pekerjaan" name="name" placeholder="Pekerjaan">
                            <option value="">-- Pilih Pekerjaan --</option>
                            <option value="Polisi" @if ($pekerjaan->name == 'Polisi')
                                selected
                            @endif>Polisi</option>
                            <option value="Buruh" @if ($pekerjaan->name == 'Buruh')
                                selected
                            @endif>Buruh</option>
                            <option value="Pemasaran" @if ($pekerjaan->name == 'Pemasaran')
                                selected
                            @endif>Pemasaran</option>
                            <option value="Pedagang Kaki Lima" @if ($pekerjaan->name == "Pedagang Kaki Lima")
                                selected
                            @endif>Pedagang Kaki Lima</option>
                            <option value="Ibu Rumah Tangga" @if ($pekerjaan->name == "Ibu Rumah Tangga")
                              selected
                          @endif>Ibu Rumah Tangga</option>
                            <option value="Guru" @if ($pekerjaan->name == "guru")
                                
                            @endif>Guru</option>
                            <option value="Dokter" @if ($pekerjaan->name == "Dokter")
                                selected
                            @endif>Dokter</option>
                            <option value="Pegawai Swasta" @if ($pekerjaan->name == "Pegawai Swasta")
                                selected
                            @endif>Pegawai Swasta</option>
                            <option value="Akuntan" @if ($pekerjaan->name == "Akuntan")
                                selected
                            @endif>Akuntan</option>
                            <option value="Mahasiswa" @if ($pekerjaan->name == "Mahasiswa")
                              selected
                            @endif>Mahasiswa</option>
                             <option value="Nelayan" @if ($pekerjaan->name == "Nelayan")
                                selected
                            @endif>Lainnya</option>
                            <option value="lainnya" @if ($pekerjaan->name == "Lainnya")
                                selected
                            @endif>Lainnya</option>
                          </select>
                        </div>

                        <div class="form-group form-group-sm">
                          <label for="nama">Penghasilan Perbulan</label>
                          <select class="form-control form-control-sm" id="penghasilan_perbulan" name="penghasilan_perbulan" placeholder="Penghasilan Perbulan">
                            <option value="">-- Pilih Pekerjaan --</option>
                            <option value="< Rp. 500.000" @if ($pekerjaan->penghasilan_perbulan == '< Rp. 500.000')
                                selected
                            @endif> Kurang dari Rp. 500.000 </option>
                            <option value="< Rp. 1.000.000" @if ($pekerjaan->penghasilan_perbulan == '< Rp. 1.000.000')
                              selected
                            @endif> Kurang dari Rp. 1.000.000 </option>
                            <option value="< Rp. 2.000.000" @if ($pekerjaan->penghasilan_perbulan == '< Rp. 2.000.000')
                              selected
                            @endif> Kurang dari Rp. 2.000.000 </option>
                            <option value="< Rp. 500.000" @if ($pekerjaan->penghasilan_perbulan == '< Rp. 500.000')
                              selected
                            @endif> Lebih dari Rp. 3.000.000 </option>
                            <option value="Tidak Berpenghasilan" @if ($pekerjaan->penghasilan_perbulan == 'Tidak Berpenghasilan')
                              selected
                            @endif> Tidak Berpenghasilan </option>
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