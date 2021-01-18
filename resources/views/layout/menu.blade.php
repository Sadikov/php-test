<nav class="nav flex-column nav-pills nav-fill">
    @foreach($menuItems as $item)
        <a class="nav-link text-left @if(request()->is($item['uri'])) active @endif" href="/{{$item['uri']}}">{{$item['name']}}</a>
    @endforeach
</nav>
