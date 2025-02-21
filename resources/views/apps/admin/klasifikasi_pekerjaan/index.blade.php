@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
              <div class="card-body">
                <div>
                  <h3 class="card-title card-title-dash">Klasifikasi Pekerjaan</h3>
                </div>
                <p></p>
                <div class="d-flex justify-content-between align-items-start">
                  <a href="{{ route('admin.pekerjaan.create') }}">
                    <button class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-plus"></i>Tambah</button>
                  </a>
                  <form action="{{ route('admin.pekerjaan') }}" style="display: flex;" method="GET">
                    <input type="text" placeholder="Cari Nama" class="form-control form-control-sm" name="q_nama" value="{{ $q_nama }}">
                    <input type="text" placeholder="Cari No. KK" class="form-control form-control-sm" style="margin-left: 10px" name="q_kk" value="{{ $q_kk }}">
                    <input type="text" placeholder="Cari No. NIK" class="form-control form-control-sm" style="margin-left: 10px" name="q_nik" value="{{ $q_nik }}">
                    <button class="btn btn-secondary btn-sm text-white mb-0 me-0" style="margin-left: 10px" type="submit"><i class="mdi mdi-search"></i>Cari</button>
                  </form>
                </div>
                
                <div class="table-responsive mt-1">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No. KK</th>
                        <th>Pekerjaan</th>
                        <th>Penghasilan Perbulan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (!empty($q_name))
                          @if (count($pekerjaan) == 0)
                            <tr>
                              <td colspan="3">Data tidak ditemukan.</td>
                            </tr>
                          @endif
                        @elseif(count($pekerjaan) == 0)
                          <tr>
                            <td colspan="3">Belum ada data.</td>
                          </tr>
                        @endif

                        @foreach ($pekerjaan as $item)
                            <tr>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->penduduk->nama }}</td>
                              <td>{{ $item->penduduk->nik }}</td>
                              <td>{{ $item->penduduk->no_kk }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->penghasilan_perbulan }}</td>
                                <td width="30%">
                                    <a href="{{ route('admin.pekerjaan.edit', $item->id) }}" style="text-decoration: none"> 
                                        <button class="btn btn-warning btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-pencil"></i>Edit</button>
                                    </a>
                                    <form action="{{ route('admin.pekerjaan.delete') }}" style="display: inline-block" method="POST">
                                        @csrf @method('DELETE')
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-danger btn-sm text-white mb-0 me-0" type="submit"><i class="mdi mdi-delete"></i>Hapus</button>
                                    </form>
                                </td>
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