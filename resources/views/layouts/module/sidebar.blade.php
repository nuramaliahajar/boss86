<div class="site-menubar-body">
    <div>
        <div>
            <ul class="site-menu" data-plugin="menu">
                <li class="site-menu-category">UMUM</li>
                <li class="site-menu-item active">
                    <a class="animsition-link" href="{{ route('home') }}">
                        <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                        <span class="site-menu-title">DASHBOARD</span>
                    </a>
                </li> 
                @can('akademik')
                <li class="site-menu-item has-sub">
                    <a href="javascript:void(0)">
                        <i class="site-menu-icon md-card" aria-hidden="true"></i>
                        <span class="site-menu-title">MASTER</span>
                        <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item active">
                            <a class="animsition-link" href="{{ route('semester.index') }}">
                                <span class="site-menu-title">Semester</span>
                            </a>
                        </li>
                        <li class="site-menu-item active">
                            <a class="animsition-link" href="{{ route('jurusan.index') }}">
                                <span class="site-menu-title">Jurusan</span>
                            </a>
                        </li>
                        <li class="site-menu-item active">
                            <a class="animsition-link" href="{{ route('kelas.index') }}">
                                <span class="site-menu-title">Kelas</span>
                            </a>
                        </li>
                        <li class="site-menu-item active">
                            <a class="animsition-link" href="{{ route('matkul.index') }}">
                                <span class="site-menu-title">Mata Kuliah</span>
                            </a>
                        </li>
                        <li class="site-menu-item active">
                            <a class="animsition-link" href="{{ route('mahasiswa.index') }}">
                                <span class="site-menu-title">Mahasiswa</span>
                            </a>
                        </li>
                        <li class="site-menu-item active">
                            <a class="animsition-link" href="{{ route('dosen.index') }}">
                                <span class="site-menu-title">Dosen</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item has-sub">
                    <a href="{{ route('user.index') }}">
                        <i class="site-menu-icon md-card" aria-hidden="true"></i>
                        <span class="site-menu-title">USER</span>
                    </a>
                </li>
                <li class="site-menu-item has-sub">
                    <a href="{{ route('transaksi.index') }}">
                        <i class="site-menu-icon md-card" aria-hidden="true"></i>
                        <span class="site-menu-title">TRANSAKSI</span>
                    </a>
                </li>
                <li class="site-menu-item has-sub">
                    <a href="{{ route('laporan.index') }}">
                        <i class="site-menu-icon md-card" aria-hidden="true"></i>
                        <span class="site-menu-title">LAPORAN</span>
                    </a>
                </li>
                @endcan
                @can('mahasiswa')
                <li class="site-menu-item has-sub">
                    <a href="{{ route('absensi.index') }}">
                        <i class="site-menu-icon md-card" aria-hidden="true"></i>
                        <span class="site-menu-title">ABSENSI</span>
                    </a>
                </li>
                <li class="site-menu-item has-sub">
                    <a href="{{ route('absensi.request') }}">
                        <i class="site-menu-icon md-card" aria-hidden="true"></i>
                        <span class="site-menu-title">REQUEST ABSEN</span>
                    </a>
                </li>
                @endcan
                @can('dosen')
                <li class="site-menu-item has-sub">
                    <a href="{{ route('transaksi.index') }}">
                        <i class="site-menu-icon md-card" aria-hidden="true"></i>
                        <span class="site-menu-title">TRANSAKSI</span>
                    </a>
                </li>
                <li class="site-menu-item has-sub">
                    <a href="{{ route('absensi.verifikasi') }}">
                        <i class="site-menu-icon md-card" aria-hidden="true"></i>
                        <span class="site-menu-title">VERIFIKASI</span>
                    </a>
                </li>
                <li class="site-menu-item has-sub">
                    <a href="{{ route('absensi.manual') }}">
                        <i class="site-menu-icon md-card" aria-hidden="true"></i>
                        <span class="site-menu-title">MANUAL ABSEN</span>
                    </a>
                </li>
                @endcan
            </ul>
            
        </div>
    </div>
</div>
<div class="site-menubar-footer">
    <a href="#" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title="Settings">
        <span class="icon md-settings" aria-hidden="true"></span>
    </a>
    <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
        <span class="icon md-eye-off" aria-hidden="true"></span>
    </a>              
    <a 
        href="{{ route('logout') }}" 
        onclick="event.preventDefault(); 
        document.getElementById('logout-form').submit();" 
        data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon md-power" aria-hidden="true"></span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>