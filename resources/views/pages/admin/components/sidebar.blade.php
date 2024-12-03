<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Data Perkantas</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                <a href="{{ route('users.index') }}"><i class="fas fa-users"></i><span>Kelola Users</span></a>
                <a href="{{ route('dataPribadi.index') }}"><i class="fas fa-id-card"></i><span>Kelola Data Pribadi</span></a>
                <a href="{{ route('dataKeluarga.index') }}"><i class="fas fa-users-cog"></i><span>Kelola Data Keluarga</span></a>
                <a href="{{ route('dataPelayanan.index') }}"><i class="fas fa-hands-helping"></i><span>Kelola Data Pelayanan</span></a>
            </li>
    </aside>
</div>
