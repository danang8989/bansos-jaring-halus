@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Klasifikasi Konsumsi</h4>
                    <p class="card-description"> Tambah Data. </p>
                    <form class="forms-sample" action="{{ route('admin.konsumsi.insert') }}" method="POST">
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
                          <label for="nama">Bahan Makanan</label>
                          <select type="text" class="form-control form-control-sm" id="bahan_makanan" name="bahan_makanan" placeholder="Bahan Makanan">
                            <option value="">-Silahkan Pilih-</option>
                            <option value="Daging">Daging</option>
                            <option value="Susu">Susu</option>
                            <option value="Ayam">Ayam</option>
                          </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="nama">Frekuensi Bahan Makanan Seminggu</label>
                          <select type="text" class="form-control form-control-sm" id="frekuensi" name="frekuensi_perminggu" placeholder="Frekuensi">
                            <option value="">-Silahkan Pilih-</option>
                            <option value="Seminggu 1 Kali">Seminggu 1 Kali</option>
                            <option value="Seminggu 2 Kali">Seminggu 2 Kali</option>
                            <option value="Jarang">Jarang</option>
                          </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="nama">Biaya Pengobatan</label>
                          <select type="text" class="form-control form-control-sm" id="biaya_pengobatan" name="biaya_pengobatan" placeholder="Biaya Pengobatan">
                            <option value="">-Silahkan Pilih-</option>
                            <option value="BPJS Berbayar">BPJS Berbayar</option>
                            <option value="BPJS Gratis">BPJS Gratis</option>
                            <option value="Mandiri">Mandiri</option>
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