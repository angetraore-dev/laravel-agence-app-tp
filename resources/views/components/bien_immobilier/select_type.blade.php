@php
    $value ??='';
    $name ??= '';
    $label ??= $name;
    $class ??=null;
    $id ??= $name;
@endphp
<div @class(['form-group'])>

{{--
{{ old($name, $v->value == $bien->type ? 'selected' : null ) }}
--}}
    <label class="label" for="{{ $name }}">{{ $label }}</label>

    <select name="{{$name}}" id="{{$id}}" class="form-control">

    @foreach( $value as $v )

        <option class="w-full" value="{{ $v->value }}" @selected( old($name) == $v->value) > {{ $v->name }}</option>
    @endforeach

    </select>

    <p @class(['text-sm text-danger'])>
        @error($name)
        {{ __($message) }}
        @enderror
    </p>
</div>
