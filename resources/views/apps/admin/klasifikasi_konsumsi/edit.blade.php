@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Klasifikasi Konsumsi</h4>
                    <p class="card-description"> Edit Data. </p>
                    <form class="forms-sample" action="{{ route('admin.konsumsi.update') }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $konsumsi->id }}">
                        <div class="form-group form-group-sm">
                          <label for="nama">Penduduk</label>
                          <select type="text" class="form-control form-control-sm" id="penduduk" name="penduduk_id" placeholder="Bahan Makanan">
                            <option value="">-Silahkan Pilih-</option>
                            @foreach ($penduduk as $item)
                              <option value="{{ $item->id }}" @if ($item->id == $konsumsi->penduduk_id) selected @endif>{{ $item->nama }} | {{ $item->nik }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group form-group-sm">
                        <label for="nama">Bahan Makanan</label>
                        <select type="text" class="form-control form-control-sm" id="bahan_makanan" name="bahan_makanan" placeholder="Bahan Makanan">
                          <option value="">-Silahkan Pilih-</option>
                          <option value="Daging" @if ($konsumsi->bahan_makanan == "Daging") selected @endif>Daging</option>
                          <option value="Ikan" @if ($konsumsi->bahan_makanan == "Ikan") selected @endif>Ikan</option>
                          <option value="Susu" @if ($konsumsi->bahan_makanan == "Susu") selected @endif>Susu</option>
                          <option value="Ayam" @if ($konsumsi->bahan_makanan == "Ayam") selected @endif>Ayam</option>
                        </select>
                      </div>
                      <div class="form-group form-group-sm">
                        <label for="nama">Frekuensi Bahan Makanan Seminggu</label>
                        <select type="text" class="form-control form-control-sm" id="frekuensi" name="frekuensi_perminggu" placeholder="Frekuensi">
                          <option value="">-Silahkan Pilih-</option>
                          <option value="Seminggu 1 Kali" @if ($konsumsi->frekuensi_perminggu == "Seminggu 1 Kali")
                              selected
                          @endif>Seminggu 1 Kali</option>
                          <option value="Seminggu 2 Kali" @if ($konsumsi->frekuensi_perminggu == "Seminggu 2 Kali")
                              selected
                          @endif>Seminggu 2 Kali</option>
                          <option value="Jarang" @if ($konsumsi->frekuensi_perminggu == "Jarang")
                              selected
                          @endif>Jarang</option>
                        </select>
                      </div>
                      <div class="form-group form-group-sm">
                        <label for="nama">Biaya Pengobatan</label>
                        <select type="text" class="form-control form-control-sm" id="biaya_pengobatan" name="biaya_pengobatan" placeholder="Biaya Pengobatan">
                          <option value="">-Silahkan Pilih-</option>
                          <option value="BPJS Berbayar" @if ($konsumsi->biaya_pengobatan == "BPJS Berbayar") selected @endif>BPJS Berbayar</option>
                          <option value="BPJS Gratis" @if ($konsumsi->biaya_pengobatan == "BPJS Gratis") selected @endif>BPJS Gratis</option>
                          <option value="Mandiri" @if ($konsumsi->biaya_pengobatan == "BPJS Mandiri") selected @endif>Mandiri</option>
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