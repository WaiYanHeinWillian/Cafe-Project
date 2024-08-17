@props(['name','value'=>''])

<x-form.input-wrapper>
    <x-form.label :name="$name"></x-form.label>
            
    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="10" class="form-control">{{ old($name,$value) }}</textarea>

    <x-error name="{{ $name }}"></x-error>
</x-form.input-wrapper>