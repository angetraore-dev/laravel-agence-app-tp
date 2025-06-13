@php
    $value ??='';
    $name ??= '';
    $label ??= $name;
    $class ??=null;
@endphp
<div @class(['form-group'])>


    <label class="label" for="{{ $name }}">{{ $label }}</label>

    <select name="{{$name}}" id="{{$name}}" class="form-control">

        @foreach( $value as $v )

            <option class="w-full" value="{{ $v->value }}"  @selected($bien->status == $v->name)> {{ old($name, $v->name) }}</option>
        @endforeach
    </select>

    <p @class(['text-sm text-danger'])>
        @error($name)
        {{ __($message) }}
        @enderror
    </p>
</div>
