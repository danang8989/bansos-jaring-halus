@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Dusun</h4>
                    <p class="card-description"> Edit Data. </p>
                    <form class="forms-sample" action="{{ route('admin.dusun.update') }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $dusun->id }}">
                        <div class="form-group form-group-sm">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="nama" value="{{ $dusun->nama }}" name="nama" placeholder="nama">
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