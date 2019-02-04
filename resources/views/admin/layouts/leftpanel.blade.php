<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ request()->is('admin') ? 'active' : '' }}">
                        <a href="/admin"><i class="menu-icon fa fa-laptop"></i>Inicio </a>
                    </li>

                    <li class="menu-title">Contenidos</li>

                    <li class="menu-item-has-children dropdown {{ request()->is('admin/categorias') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th-list"></i>Categorias</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-th-list"></i><a href="/admin/categorias">Listar Categorias</a></li>
                            <li><i class="fa fa-th-list"></i><a href="/admin/categorias/create">Crear Categorias</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown {{ request()->is('admin/subcategorias') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>SubCategorias</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-th"></i><a href="/admin/subcategorias">Listar SubCategorias</a></li>
                            <li><i class="fa fa-th"></i><a href="/admin/subcategorias/create">Crear SubCategorias</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown {{ request()->is('admin/contenidos') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th-large"></i>Contenidos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-th-large"></i><a href="/admin/contenidos">Listar Contenidos</a></li>
                            <li><i class="fa fa-th-large"></i><a href="/admin/contenidos/create">Crear Contenidos</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Multimedia</li>

                    <li class="menu-item-has-children dropdown {{ request()->is('admin/videos') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-youtube-play"></i>Videos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-youtube-play"></i><a href="/admin/videos">Listar Videos</a></li>
                            <li><i class="fa fa-youtube-play"></i><a href="/admin/videos/create">Crear Videos</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown {{ request()->is('admin/imagenes') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-image-o"></i>Imagen Temporada</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-file-image-o"></i><a href="/admin/imagenes">Listar Imagen</a></li>
                            <li><i class="fa fa-file-image-o"></i><a href="/admin/imagenes/create">Crear Imagen</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Usuario</li><!-- /.menu-title -->

                    <li>
                        <a href="{{ route('logout') }}" 
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">

                                                <i class="menu-icon fa fa-power-off text-danger"></i>{{ __('Logout') }}
                            </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>