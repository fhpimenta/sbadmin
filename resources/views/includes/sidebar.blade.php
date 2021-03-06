<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i>&nbsp; Dashboard</a>
            </li>
            <li>
                <a href=""><i class="fa fa-edit fa-fw"></i>&nbsp; Cadastros<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/pessoas/cadastrar') }}"><i class="fa fa-user"></i>&nbsp; Pessoas</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href=""><i class="fa fa-table"></i>&nbsp; Visualização<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/associados') }}">Associados <span class="badge">@yield('Associado')</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/doadores') }}">Doadores <span class="badge">@yield('Doador')</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/clubedolivro') }}">Clube do Livro <span class="badge">@yield('Clube do Livro')</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/prestadores') }}">Prestadores de Serviço <span class="badge">@yield('Prestador de Serviços')</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-money"></i>&nbsp; Financeiro<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Contas</a>
                        <a href="#">Saldo</a>
                        <a href="#">Recibos</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
