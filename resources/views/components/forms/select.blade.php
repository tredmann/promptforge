@props(['name','label', 'required' => 'false', 'values' => []])
<div  class="uk-margin">
    <label class="uk-form-label" for="{{ $name }}">{{ $label }}</label>
    <div class="uk-form-controls">


        <select class="uk-select" @if($required === true) required @endif
                id="{{ $name }}"
                name="{{ $name }}"
                {{$attributes}}
        >
            <option></option>
            @foreach($values as $value)
                <option value="{{$value}}">{{$value}}</option>
            @endforeach

        </select>


    </div>
</div>