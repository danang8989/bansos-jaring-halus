@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
              <div class="card-body">
                <div>
                  <h3 class="card-title card-title-dash">Dusun</h3>
                </div>
                <p></p>
                <div class="d-flex justify-content-between align-items-start">
                  <a href="{{ route('kepdes.dusun.create') }}">
                    {{-- <button class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-plus"></i>Tambah</button> --}}
                  </a>
                  <form action="{{ route('kepdes.dusun') }}" method="GET">
                    <input type="text" placeholder="Cari Nama" class="form-control form-control-sm" name="q_name" value="{{ $q_name }}">
                  </form>
                </div>
                
                <div class="table-responsive mt-1">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        {{-- <th>Aksi</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @if (!empty($q_name))
                          @if (count($dusun) == 0)
                            <tr>
                              <td colspan="3">Data tidak ditemukan.</td>
                            </tr>
                          @endif
                        @elseif(count($dusun) == 0)
                          <tr>
                            <td colspan="3">Belum ada data.</td>
                          </tr>
                        @endif

                        @foreach ($dusun as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->nama }}
                                </td>
                                {{-- <td width="30%">
                                    <a href="{{ route('kepdes.dusun.edit', $item->id) }}" style="text-decoration: none"> 
                                        <button class="btn btn-warning btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-pencil"></i>Edit</button>
                                    </a>
                                    <form action="{{ route('kepdes.dusun.delete') }}" style="display: inline-block" method="POST">
                                        @csrf @method('DELETE')
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-danger btn-sm text-white mb-0 me-0" type="submit"><i class="mdi mdi-delete"></i>Hapus</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('footer-scripts')
    
@endsection