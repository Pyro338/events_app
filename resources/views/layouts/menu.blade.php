<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>На главную</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Пользователи</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('events') }}" class="nav-link {{ Request::is('events') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>События</p>
    </a>
</li>
