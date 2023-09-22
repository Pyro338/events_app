<a href="#" class="nav-link">
    <i class="nav-icon fas fa-caret-right" aria-hidden="true"></i>
    <p>
        Все события
    </p>
    <i class="right fas fa-angle-left"></i>
</a>
<ul class="nav nav-treeview">
    @foreach($all_events as $event)
        <li class="nav-item">
            <a
                href="{{ route('event.show', $event) }}"
                class="nav-link {{ Request::is('events/'. $event->id) ? 'active' : '' }}"
            >
                <i class="nav-icon fas fa-angle-right"></i>
                <p>{{$event->title}}</p>
            </a>
        </li>
    @endforeach
</ul>
<a href="#" class="nav-link">
    <i class="nav-icon fas fa-caret-right" aria-hidden="true"></i>
    <p>
        Мои события
    </p>
    <i class="right fas fa-angle-left"></i>
</a>
<ul class="nav nav-treeview">
    @foreach($my_events as $event)
        <li class="nav-item">
            <a
                href="{{ route('event.show', $event) }}"
                class="nav-link {{ Request::is('events/'. $event->id) ? 'active' : '' }}"
            >
                <i class="nav-icon fas fa-angle-right"></i>
                <p>{{$event->title}}</p>
            </a>
        </li>
    @endforeach
</ul>
