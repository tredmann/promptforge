@props(['name', 'label', 'value' => null, 'required' => 'false'])


<div class="uk-margin">
    <label class="uk-form-label" for="{{ $name }}">{{ $label }}</label>

    <textarea name="{{ $name }}" id="{{ $name }}"

              class="uk-textarea @error($name) uk-form-danger @enderror"
              @if($required == 'true') required
              @else placeholder="optional" @endif
            {{$attributes}}
                                             >{{ old($name) }}</textarea>

</div>

