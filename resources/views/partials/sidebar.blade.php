<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle">MuzZone</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Разделы
            </li>

            <li class="sidebar-item  {{request()->routeIs('manager.dashboard') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('manager.dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Панель управления</span>
                </a>
            </li>

            <li class="sidebar-item {{request()->routeIs('manager.tracks.index') ? 'active' : ''}}">
                <a class="sidebar-link active" href="{{route('manager.tracks.index')}}">
                    <i class="align-middle" data-feather="radio"></i> <span class="align-middle">Треки</span>
                </a>
            </li>

            <li class="sidebar-item {{request()->routeIs('manager.artists.index') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('manager.artists.index')}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Исполнители</span>
                </a>
            </li>

            <li class="sidebar-item {{request()->routeIs('manager.genres.index') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('manager.genres.index')}}">
                    <i class="align-middle" data-feather="rss"></i> <span class="align-middle">Жанры</span>
                </a>
            </li>

            <li class="sidebar-item {{request()->routeIs('manager.albums.index') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('manager.albums.index')}}">
                    <i class="align-middle" data-feather="play-circle"></i> <span class="align-middle">Альбомы</span>
                </a>
            </li>

            <li class="sidebar-item {{request()->routeIs('manager.categories.index') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('manager.categories.index')}}">
                    <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Категории</span>
                </a>
            </li>

            <li class="sidebar-item {{request()->routeIs('manager.playlists.index') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('manager.playlists.index')}}">
                    <i class="align-middle" data-feather="zap"></i> <span class="align-middle">Плейлисты</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Выход</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
