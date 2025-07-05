<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="/admin/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Data Pendaftar
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/admin/daftar-santri-baru">Data Santri</a>
                        <a class="nav-link" href="/admin/santri-diterima">Santri Diterima</a>
                        <a class="nav-link" href="/admin/santri-ditolak">Santri Ditolak</a>
                    </nav>
                </div>
                <a class="nav-link" href="/admin/santri-daftar-ulang">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Santri Daftar Ulang
                </a>
                <a class="nav-link" href="/admin/pengumuman">
                    <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                    Pengumuman
                </a>
                <a class="nav-link" href="{{ route('admin.logs.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-universal-access"></i></div>
                    Log Aktifitas
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Go to:</div>
            Website
        </div>
    </nav>
</div>