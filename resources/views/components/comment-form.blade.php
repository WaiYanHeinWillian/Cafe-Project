@props(['menu'])

<section class="container">
    <div class="col-md-8 mx-auto">
      @auth
        <x-card-wrapper>
      
          <form action="/menus/{{ $menu->slug }}/comments" method="POST">
            @csrf

            <div class="mb-3">
  
              <textarea name="body" class="form-control border border-0" cols="10" rows="5" placeholder="Say Something..."></textarea>

              <x-error name="body"></x-error>
              
            </div>
            
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
  
          </form>
          
        </x-card-wrapper>
      @else
        <p class="text-center text-secondary">Please <a href="/login">login</a> to participate in this discussion.</p>
      @endauth
    </div>
  </section>