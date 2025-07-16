@extends('layouts.dashboard')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="home-tab">
      <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
          </li> --}}
        </ul>
        <div>
        </div>
      </div>
      <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
          <div class="row">
            <div class="col-sm-12">
              <div class="statistics-details d-flex align-items-center justify-content-between">
                <div>
                  <p class="statistics-title">Dusun</p>
                  <h3 class="rate-percentage">{{ $dusun }}</h3>
                </div>
                <div>
                  <p class="statistics-title">Penduduk</p>
                  <h3 class="rate-percentage">{{ $penduduk }}</h3>
                </div>
                <div>
                  <p class="statistics-title">Laki - Laki</p>
                  <h3 class="rate-percentage">{{ $laki_laki }}</h3>
                </div>
                <div class="d-none d-md-block">
                  <p class="statistics-title">Perempuan</p>
                  <h3 class="rate-percentage">{{ $perempuan }}</h3>
                </div>
                <div class="d-none d-md-block">
                  <p class="statistics-title">Warga Disabilitas</p>
                  <h3 class="rate-percentage">{{ $disabilitas }}</h3>
                </div>
                <div class="d-none d-md-block">
                  <p class="statistics-title">Dana Bansos Terasalurkan</p>
                  <h3 class="rate-percentage">{{ $sudah_tersalurkan }}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 d-flex flex-column">
              <div class="row flex-grow">
                <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash">Grafik Bantuan Sosial Desa Jaring Halus</h4>
                          <h5 class="card-subtitle card-subtitle-dash">Cek grafik jumlah penduduk dan jumlah dana tersalurkan.</h5>
                        </div>
                        <div id="performanceLine-legend"></div>
                      </div>
                      <div class="chartjs-wrapper mt-4">
                        <canvas id="performanceLine" width=""></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row flex-grow">
                <div class="col-md-6 col-lg-12 grid-margin">
                  <div class="card bg-primary card-rounded" style="padding-bottom: 20px">
                    <div class="card-body pb-0">
                      <h4 class="card-title card-title-dash text-white mb-4">Desa Jaring Halus</h4>
                      <div class="row">
                        <div class="col-sm-6 text-white">
                          Nama Desa
                        </div>
                        <div class="col-sm-6 text-white">
                          : Jaring Halus
                        </div>
                        <div class="col-sm-6 text-white">
                          Kabupaten
                        </div>
                        <div class="col-sm-6 text-white">
                          : Langkat
                        </div>
                        <div class="col-sm-6 text-white">
                          Provinsi
                        </div>
                        <div class="col-sm-6 text-white">
                          : Sumatera Utara
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                              <h4 class="card-title card-title-dash">Daftar Dusun</h4>
                            </div>
                          </div>
                          <div class="mt-3">
                            @foreach ($daftar_dusun as $item)
                            <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                              <div class="d-flex">
                                <div class="wrapper ms-3">
                                  <p class="mb-1 fw-bold">{{ $item->nama }}</p>
                                  <small class="text-muted mb-0">{{ $item->getJumlahPenduduk($item->id) }} Penduduk</small>
                                </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 d-flex flex-column">
           
              <div class="row flex-grow">
                <div class="col-12 grid-margin">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash">Bantuan Sosial Yang Belum Tersalurkan</h4>
                          <p class="card-subtitle card-subtitle-dash">Ada 2 penduduk yang belum menerima</p>
                        </div>
                        <div>
                          {{-- <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button> --}}
                        </div>
                      </div>
                      <div class="table-responsive  mt-1">
                        <table class="table select-table">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Nama</th>
                              <th>NIK</th>
                              <th>No. KK</th>
                              <th>Jenis Bantuan</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(count($daftar_belum_tersalurkan) == 0)
                              <tr>
                                <td colspan="5">Belum ada data.</td>
                              </tr>
                            @endif

                            @foreach ($daftar_belum_tersalurkan as $item)
                              <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->penduduk->nama }}</td>
                                <td>{{ $item->penduduk->nik }}</td>
                                <td>{{ $item->penduduk->no_kk }}</td>
                                <td>{{ $item->jenisBantuan->nama }}</td>
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
            <div class="col-lg-4 d-flex flex-column">
    
              
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