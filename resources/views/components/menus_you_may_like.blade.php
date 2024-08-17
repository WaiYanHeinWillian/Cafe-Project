@props(['randomMenus','menu'])

<section class="blogs_you_may_like">
      <div class="container">
        <h3 class="text-center my-4 fw-bold">Menus You May Like</h3>
        <div class="row text-center">
            

            @foreach ($randomMenus as $menu)
                <div class="col-md-4 mb-4">
                    <x-menu-card :menu="$menu"></x-menu-card>
                </div>
            @endforeach
          
        </div>
      </div>
    </section>