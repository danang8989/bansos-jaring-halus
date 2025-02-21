@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Daftar Penyaluran</h4>
                    <p class="card-description"> Proses Penyaluran Dana. </p>
                    <form class="forms-sample" action="{{ route('admin.daftar_penyaluran.update') }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $bantuan->id }}">
                        <div class="form-group form-group-sm">
                          <label for="nama">Penduduk</label>
                          <select type="text" class="form-control form-control-sm" id="penduduk" name="penduduk_id" placeholder="Bahan Makanan" disabled>
                            <option value="">-Silahkan Pilih-</option>
                            @foreach ($penduduk as $item)
                              <option value="{{ $item->id }}" @if ($item->id == $bantuan->penduduk_id) selected @endif>{{ $item->nama }} | {{ $item->nik }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group form-group-sm">
                          <label for="bantuan">Jenis Bantuan</label>
                          <select type="text" class="form-control form-control-sm" id="penduduk" name="jenis_bantuan_id" placeholder="Bahan Makanan" disabled>
                            <option value="">-Silahkan Pilih-</option>
                            @foreach ($jenis_bantuan as $item)
                              <option value="{{ $item->id }}" @if ($item->id == $bantuan->jenis_bantuan_id) selected @endif>{{ $item->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                     
                        <button type="submit" class="btn btn-primary me-2">Simpan jika dana sudah disalurkan</button>
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