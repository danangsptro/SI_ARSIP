<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">ARSIP DATA</a>
            <a class="navbar-brand hidden" href="#">A</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('index-user') }}"> <i class="menu-icon fa fa-user"></i>User
                    </a>
                </li> --}}
                <h3 class="menu-title">UI elements</h3>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Kode</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-table"></i><a href="{{ route('pengajuan') }}">Kode Surat</a>
                        </li>
                    </ul>
                </li>

                <h3 class="menu-title">Data</h3>
                <li>
                    <a href="{{route('dataUser')}}"> <i class="menu-icon fa fa-user"></i>Data User
                    </a>
                </li>
                @if (Auth::user()->user_role != 'sekdes')
                    <li>
                        <a href="{{ route('pengajuanSurat') }}"> <i class="menu-icon fa fa-folder"></i>Tambah Arsip
                        </a>
                    </li>
                @endif
                <li class="menu-item-has-children dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Laporan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-table"></i><a href="{{ route('laporan') }}">Lihat Laporan</a>
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->user_role === 'Kasubag')
                    <h3 class="menu-title">USER</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Register</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-table"></i><a href="{{ route('pengajuanSurat') }}">User</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</aside>
