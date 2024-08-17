
<x-admin-layout>
    <h3 class="text-center">Menus</h3>
    
    <x-card-wrapper>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">title</th>
                <th scope="col">intro</th>
                <th scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $menu)
                  <tr>

                    <td><a target="_blank" href="/menus/{{ $menu->slug }}">{{ $menu->title }}</a></td>
                    <td>{{ $menu->intro }}</td>

                    <td><a href="/admin/menus/{{ $menu->slug }}/edit" class="btn btn-warning">Edit</a></td>

                    <td>
                        <form action="/admin/menus/{{ $menu->slug }}/delete" method="POST">
                            @csrf
                            @method('DELETE')


                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                  </tr>
              @endforeach
            </tbody>
          </table>
          {{ $menus->links() }}
    </x-card-wrapper>

</x-admin-layout>