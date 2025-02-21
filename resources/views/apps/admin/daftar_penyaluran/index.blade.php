@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
              <div class="card-body">
                <div>
                  <h3 class="card-title card-title-dash">Daftar Penyaluran Bantuan</h3>
                </div>
                <p></p>
                <div class="d-flex justify-content-between align-items-start">
                  <div></div>
                  
                  <form action="{{ route('admin.daftar_penyaluran') }}" style="display: flex;" method="GET">
                    <input type="text" placeholder="Cari No. NIK" class="form-control form-control-sm" name="q_nik" value="{{ $q_nik }}">
                    <select type="text" class="form-control form-control-sm" style="margin-left: 10px" name="q_status_penyaluran">
                      <option value="">Cari Status Penyaluran</option>
                      <option value="1" @if ($q_status_penyaluran == 1)
                          selected
                      @endif>Sudah</option>
                      <option value="0" @if ($q_status_penyaluran == 0)
                          selected
                      @endif>Belum</option>
                    </select>
                    <select placeholder="Cari Nama" style="margin-left: 10px" class="form-control form-control-sm" name="q_jenis_bantuan">
                      <option value="">-Piilh Jenis Bantuan-</option>
                      @foreach ($jenis_bantuan as $item)
                          <option value="{{ $item->id }}" @if ($item->id == $q_jenis_bantuan)
                              selected
                          @endif>{{$item->nama}}</option>
                      @endforeach
                    </select>
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
                        <th>Jenis Bantuan</th>
                        <th>Tanggal Diterima</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (!empty($q_name))
                          @if (count($bantuan) == 0)
                            <tr>
                              <td colspan="3">Data tidak ditemukan.</td>
                            </tr>
                          @endif
                        @elseif(count($bantuan) == 0)
                          <tr>
                            <td colspan="3">Belum ada data.</td>
                          </tr>
                        @endif

                        @foreach ($bantuan as $item)
                            <tr>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->penduduk->nama }}</td>
                              <td>{{ $item->penduduk->nik }}</td>
                              <td>{{ $item->penduduk->no_kk }}</td>
                              <td>{{ $item->jenisBantuan->nama }}</td>
                              <td>
                                @if ($item->tanggal_penyaluran != null)
                                  {{ date('d/m/Y', strtotime($item->tanggal_penyaluran)) }}
                                @else
                                  -
                                @endif
                              </td>
                                <td width="30%">
                                    @if ($item->status)
                                      <div class="badge badge-opacity-success">Dana Bantuan Sudah Diterima</div>
                                 
                                    @else
                                      <a href="{{ route('admin.daftar_penyaluran.edit', $item->id) }}" style="text-decoration: none"> 
                                          <button class="btn btn-warning btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-pencil"></i>Proses Status</button>
                                      </a>
                                    @endif
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