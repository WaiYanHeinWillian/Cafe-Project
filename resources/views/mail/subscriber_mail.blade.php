<h1>{{ $menu->title }}</h1>

<div>
    <h3>Intro - {{ $menu->intro }}</h3>
</div>

<span>
    Category - <button>{{ $menu->category->name }}</button>
</span>

<div>
    Body - {{ $menu->body }}
</div>
