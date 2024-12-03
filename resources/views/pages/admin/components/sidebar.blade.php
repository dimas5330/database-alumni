<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="{{route('admin.dashboard')}}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <a href="{{ route('users.index') }}"><i class="fas fa-fire"></i><span>Kelola Users</span></a>
                <a href="{{ route('dataPribadi.index') }}"><i class="fas fa-fire"></i><span>Kelola Data
                        Pribadi</span></a>
                <a href="{{ route('dataKeluarga.index') }}"><i class="fas fa-fire"></i><span>Kelola Data
                        Keluarga</span></a>
                <a href="{{ route('dataPelayanan.index') }}"><i class="fas fa-fire"></i><span>Kelola Data
                        Pelayanan</span></a>
            </li>
    </aside>
</div>
