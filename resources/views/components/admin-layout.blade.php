<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-3">
                <ul class="list-group mt-5">
                    <li class="list-group-item"><a href="/admin/menus">Dashboard</a></li>
                    <li class="list-group-item"><a href="/admin/menus/create">Create Menu</a></li>
                  </ul>
            </div>
            
            <div class="col-md-10">
                {{ $slot }}
            </div>
            
        </div>
    </div>
</x-layout>