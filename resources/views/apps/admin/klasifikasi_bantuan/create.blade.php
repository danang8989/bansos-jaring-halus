@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Klasifikasi Bantuan</h4>
                    <p class="card-description"> Tambah Data. </p>
                    <form class="forms-sample" action="{{ route('admin.bantuan.insert') }}" method="POST">
                        @csrf @method('POST')
                        <div class="form-group form-group-sm">
                            <label for="nama">Penduduk</label>
                            <select type="text" class="form-control form-control-sm" id="penduduk" name="penduduk_id" placeholder="Penduduk">
                              <option value="">-Silahkan Pilih-</option>
                              @foreach ($penduduk as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} | {{ $item->nik }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-sm">
                          <label for="nama">Jenis Bantuan</label>
                          <select type="text" class="form-control form-control-sm" id="jenis_bantuan" name="jenis_bantuan_id" placeholder="Jenis Bantuan">
                            <option value="">-Silahkan Pilih-</option>
                            @foreach ($jenis_bantuan as $item)
                              <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
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