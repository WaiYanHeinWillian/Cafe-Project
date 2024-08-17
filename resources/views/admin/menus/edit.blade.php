
<x-admin-layout>
    <h3 class="my-3 text-center">Menu Edit Form</h3>
    
        <x-card-wrapper>
            <form enctype="multipart/form-data" action="/admin/menus/{{ $menu->slug }}/update" method="POST">
                @csrf
                @method('PATCH')

                <x-form.input name="title" value="{{ $menu->title }}"></x-form.input> 

                <x-form.textarea name="body" value="{{ $menu->body }}"></x-form.textarea>

                <x-form.input name="thumbnail" type="file"></x-form.input> 
                <img src="/storage/{{ $menu->thumbnail }}" alt="" width="200" height="100">

                <x-form.input name="intro" value="{{ $menu->intro }}"></x-form.input> 

                <x-form.input name="slug" value="{{ $menu->slug }}"></x-form.input> 

                <x-form.input-wrapper>
                    <x-form.label name="category"></x-form.label>

                    <select name="category_id" id="category" class="form-control">
                        
                        @foreach ($categories as $category)
                            <option {{ $category->id==old("category_id",$menu->category->id)?'selected':"" }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>

                    <x-error name="category_id"></x-error>
                </x-form.input-wrapper>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </x-card-wrapper>
    
</x-admin-layout>