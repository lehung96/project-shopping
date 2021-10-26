@if($menuParent->MenusChildrent->count())
    <ul class="hb-dropdown">
        @foreach($menuParent->MenusChildrent as $menuChild)
            <li class="sub-dropdown-holder"><a href="blog-left-sidebar.html">{{ $menuChild->name }}</a>
            </li>
        @endforeach
    </ul>
@endif
