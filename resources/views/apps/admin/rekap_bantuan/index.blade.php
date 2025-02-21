@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex flex-column">    
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
              <div class="card-body">
                <div>
                  <h3 class="card-title card-title-dash">Rekap Penyaluran Bantuan</h3>
                </div>
                <p></p>
                <div class="d-flex justify-content-between align-items-start">
                  <div></div>
                  
                  <form action="{{ route('admin.rekap_bantuan.download') }}" style="display: flex; align-items: center" method="POST">
                    @csrf @method('POST')
                    <div class="form-group"  style="margin-right: 10px;">
                      <div class="form-label">Dari Tanggal</div>
                      <input type="date" placeholder="Tanggal Dari" class="form-control form-control-sm" style=" height: 30px" name="q_date_from" value="{{ $q_date_from }}">
                    </div>
                    <div class="form-group">
                      <div class="form-label">Sampai Tanggal</div>
                      <input type="date" placeholder="Tanggal Sampai" class="form-control form-control-sm" style="maring-left: 10px; height: 30px" name="q_until_date" value="{{ $q_until_date }}">
                    </div>
                    
                    <button class="btn btn-secondary btn-sm text-white mb-0 me-0" style="margin-left: 10px; height: 40px" type="submit"><i class="mdi mdi-search"></i>Cetak</button>
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
                      </tr>
                    </thead>
                    <tbody>
                        @if (!empty($q_name))
                          @if (count($rekap_bantuan) == 0)
                            <tr>
                              <td colspan="3">Data tidak ditemukan.</td>
                            </tr>
                          @endif
                        @elseif(count($rekap_bantuan) == 0)
                          <tr>
                            <td colspan="3">Belum ada data.</td>
                          </tr>
                        @endif

                        @foreach ($rekap_bantuan as $item)
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