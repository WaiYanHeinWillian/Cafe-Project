<x-layout>

        <x-slot name='title'>
            <title>All Menus</title>
        </x-slot>
    
        @foreach ($menus as $menu)
        <h1><a href="menus/{{ $menu->slug }}">{{ $menu->title }}</a></h1>
        
        <div>
            <p> Created At - {{ $menu->date }}</p>
            <p>{{ $menu->intro }}</p>
        </div>
        @endforeach
    
</x-layout>

