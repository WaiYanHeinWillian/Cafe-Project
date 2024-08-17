{{-- <x-layout>

        <x-slot name='title'>
            <title>All Menus</title>
        </x-slot>
    
        @foreach ($menus as $menu)
        <h1><a href="menus/{{ $menu->slug }}">{{ $menu->title }}</a></h1>

        <h4>Author - <a href="/users/{{ $menu->author->username }}">{{ $menu->author->name }}</a></h4>

        <p>
            <a href="/categories/{{ $menu->category->slug }}">{{ $menu->category->name }}</a>
        </p>
        
        <div>
            <p> Created At - {{ $menu->created_at->diffForHumans() }}</p>
            <p>{{ $menu->intro }}</p>
        </div>
        @endforeach
    
</x-layout>
 --}}


 <x-layout> 
    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    
     <x-hero></x-hero>
     
     <x-menus-section :menus="$menus" ></x-menus-section>
     
     
     
</x-layout>
 
