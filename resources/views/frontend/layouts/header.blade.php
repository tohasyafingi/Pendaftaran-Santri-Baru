<header id="header" class="header d-flex align-items-center sticky-top">
  <div
    class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-end">

    <a href="/" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.webp" alt=""> -->
      <h1 class="sitename">PPUQ</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        @auth
        @if (auth()->user()->role === 'santri')
        <li><a href="{{ route('santri.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('santri.identitas') }}">Identitas</a></li>
        @if (auth()->user()->role === 'santri' && in_array(optional(auth()->user()->santri)->status, ['terima', 'aktif']))
        <li><a href="/santri/daftar-ulang">Daftar Ulang</a></li>
        @endif
        <li>
          <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit">Logout</button>
          </form>
        </li>
      @endif
    @else
      <li><a href="#" class="active">Home</a></li>
      <li><a href="#jadwal">Jadwal</a></li>
      <li><a href="#informasi">Informasi</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="/pendaftaran">Formulir</a></li>
      <li><a href="/login">Login</a></li>
    @endauth

      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>