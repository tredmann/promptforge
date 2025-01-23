@props(['name','label', 'required' => 'false'])
<div  class="uk-margin">
    <label class="uk-form-label" for="{{ $name }}">{{ $label }}</label>
    <div class="uk-form-controls">
        <input @if($required === true) required @endif
        class="uk-input @error($name) uk-form-danger @enderror"
               id="{{ $name }}"
               name="{{ $name }}"
               type="number"


               @if($required == 'true') required @else placeholder="optional" @endif

                {{$attributes}}>
    </div>
</div>