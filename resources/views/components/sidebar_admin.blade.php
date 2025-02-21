<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dusun') }}">
          <i class="menu-icon mdi mdi-home-group"></i>
          <span class="menu-title">Dusun</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.jenis_bantuan') }}">
          <i class="menu-icon mdi mdi-handshake"></i>
          <span class="menu-title">Jenis Bantuan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.penduduk') }}">
          <i class="menu-icon mdi mdi-account-group"></i>
          <span class="menu-title">Penduduk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.konsumsi') }}">
          <i class="menu-icon mdi mdi-food"></i>
          <span class="menu-title">Klasisfikasi Konsumsi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pekerjaan') }}">
          <i class="menu-icon mdi mdi-briefcase"></i>
          <span class="menu-title">Klasifikasi Pekerjaan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.bantuan') }}">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Klasifikasi Bantuan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.daftar_penyaluran') }}">
          <i class="menu-icon mdi mdi-package-variant-closed-plus"></i>
          <span class="menu-title">Daftar Penyaluran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.rekap_bantuan') }}">
          <i class="menu-icon mdi mdi-printer"></i>
          <span class="menu-title">Rekap Penyaluran</span>
        </a>
      </li>
    </ul>
  </nav>