@props(['menu'])

<div class="card">
    <img
      src='{{ asset("storage/$menu->thumbnail") }}'
      alt="..."
    />
    <div class="card-body">
      <h3 class="card-title">{{ $menu->title }}</h3>
      <p class="fs-6 text-secondary">
        <a href="/?username={{ $menu->author->username }}{{ request('search')?"&search=".request('search'):""  }}{{ request('category')?"&category=".request('category'):""  }}">{{ $menu->author->name }}</a>
        <span> - {{ $menu->created_at->diffForHumans() }}</span>
      </p>
      <div class="tags my-3">

        <a href="/?category={{ $menu->category->slug }}"><span class="badge bg-primary">{{ $menu->category->name }}</span></a>

        {{-- <span class="badge bg-secondary">Css</span>
        <span class="badge bg-success">Php</span>
        <span class="badge bg-danger">Javascript</span>
        <span class="badge bg-warning text-dark">Frontend</span> --}}
      </div>
      <p class="card-text">
        {{ $menu->intro }}
      </p>
      <a href="/menus/{{ $menu->slug }}" class="btn btn-primary">Read More</a>
    </div>
  </div>