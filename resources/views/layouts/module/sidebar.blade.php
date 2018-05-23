<div class="site-menubar-body">
    <div>
        <div>
            <ul class="site-menu" data-plugin="menu">
                <li class="site-menu-category">UMUM</li>
                <li class="site-menu-item active">
                    <a class="animsition-link" href="index.php">
                        <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                        <span class="site-menu-title">DASHBOARD</span>
                    </a>
                </li> 
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
                
            </ul>
            <div class="site-menubar-section">
                <h5>
                    Progress Bulan Ini
                    <span class="float-right">80%</span>
                </h5>
                <div class="progress progress-xs">
                    <div class="progress-bar active" style="width: 80%;" role="progressbar"></div>
                </div>
                <h5>
                    Tahunan
                    <span class="float-right">30%</span>
                </h5>
                <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-warning" style="width: 30%;" role="progressbar"></div>
                </div>
            </div>
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
    <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon md-power" aria-hidden="true"></span>
    </a>
</div>