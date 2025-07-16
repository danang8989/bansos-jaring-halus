<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kepdes.dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kepdes.jenis_bantuan') }}">
          <i class="menu-icon mdi mdi-handshake"></i>
          <span class="menu-title">Jenis Bantuan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kepdes.penduduk') }}">
          <i class="menu-icon mdi mdi-account-group"></i>
          <span class="menu-title">Penduduk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kepdes.bantuan') }}">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Klasifikasi Bantuan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kepdes.daftar_penyaluran') }}">
          <i class="menu-icon mdi mdi-package-variant-closed-plus"></i>
          <span class="menu-title">Daftar Penyaluran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kepdes.rekap_bantuan') }}">
          <i class="menu-icon mdi mdi-printer"></i>
          <span class="menu-title">Rekap Penyaluran</span>
        </a>
      </li>
    </ul>
  </nav>