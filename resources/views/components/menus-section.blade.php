@props(['menus'])

<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Menus</h1>
    <div class="">

      <x-category-dropdown></x-category-dropdown>

      {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
        <option value="">Filter by Tag</option>
      </select> --}}

    </div>
    <form action="" class="my-3">
      <div class="input-group mb-3">
        <input
          name="search"
          value="{{ request('search') }}"
          type="text"
          autocomplete="false"
          class="form-control"
          placeholder="Search Menus..."
        />

        @if (request('category'))
          <input
          name="category"
          value="{{ request('category') }}"
          type="hidden"
          />
        @endif

        @if (request('username'))
          <input
          name="username"
          value="{{ request('username') }}"
          type="hidden"
          />
        @endif

        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">

      @forelse ($menus as $menu)
        <div class="col-md-4 mb-4">
          <x-menu-card :menu="$menu"></x-menu-card>
        </div>
      
      @empty
        <p class="text-warning">There is no menus fond!</p>
      @endforelse

      {{ $menus->links() }}
      
      
    </div>
  </section>