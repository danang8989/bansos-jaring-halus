@extends('layouts.login')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
              </div>
              <h4 class="text-center">Desa Jaring Halus</h4>
              <h6 class="text-center fw-light">Masuk.</h6>
              <form class="pt-3" method="POST" action="{{ route('login') }}">
                @csrf @method('POST')
                <div class="form-group">
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                </div>
                <div class="mt-3 d-grid gap-2">
                  <button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" type="submit">Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@endsection