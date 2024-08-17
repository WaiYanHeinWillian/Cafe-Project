@props(['menu','randomMenus'])
<x-layout>

    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="/storage/{{ $menu->thumbnail }}"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{ $menu->title }}</h3>

          <div>
            <div>Author - <a href="/users/{{ $menu->author->username }}">{{ $menu->author->name }}</a></div>
            
            <a href="/categories/{{ $menu->category->slug }}">
                <span class="badge bg-primary">
                    {{ $menu->category->name }}
                </span>
            </a>

            <div class="text-secondary">{{ $menu->created_at->diffForHumans() }}</div>
            </div>

            <div class="text-secondary">

              <form action="/menus/{{ $menu->slug }}/subscription" method="POST">
                @csrf

                @auth
                  @if (auth()->user()->isSubscribed($menu))
                    <button class="btn btn-danger">UnSubscribe</button>
                  @else
                    <button class="btn btn-warning">Subscribe</button>
                  @endif
                @endauth
                
              </form>

            </div>

          <p class="lh-md mt-3">
            {{ $menu->body }}
          </p>
        </div>
      </div>
    </div>

    <x-comment-form :menu="$menu"></x-comment-form>

    {{-- comments section --}}
    @if ($menu->comments->count())
      <x-comments :comments="$menu->comments()->latest()->paginate(3)"></x-comments>
    @endif

    

    <x-menus_you_may_like :randomMenus="$randomMenus" ></x-menus_you_may_like>
</x-layout>
