<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Coffee Pub</a>
      <div class="d-flex">

        @auth
          @if (auth()->user()->can('admin'))
            <a href="/admin/menus" class="nav-link">DashBoard</a>
          @endif
        @endauth

        <a href="/#blogs" class="nav-link">Menus</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>

        @auth

          <img src="{{ auth()->user()->avatar }} " width="50" height="50" class="rounded-circle" alt="">

          <a href="" class="nav-link">Welcome {{ auth()->user()->name }}</a>

          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="nav-link btn btn-link">LogOut</button>
          </form>

        @else
          <a href="/register" class="nav-link">Register</a>
          <a href="/login" class="nav-link">Login</a>
        @endauth

        
        

        

      </div>
    </div>
  </nav>