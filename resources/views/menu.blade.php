<x-layout>

    <x-slot name='title'>
        <title>{{ $menu->title }}</title>
    </x-slot>

    <h1>{{ $menu->title }}</h1>
    
    <p>{!! $menu->body !!}</p>
    
    <a href="/">Go Back</a>

</x-layout>
    
    


