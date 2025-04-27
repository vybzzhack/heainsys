<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clients.index') }}" class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Clients</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('programs.index') }}" class="nav-link {{ Request::is('programs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus-square"></i>
        <p>Programs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('enrollments.index') }}" class="nav-link {{ Request::is('enrollments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-hospital"></i>
        <p>Enrollments</p>
    </a>
</li>
