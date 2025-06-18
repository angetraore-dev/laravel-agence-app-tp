@php
    $value ??='';
    $name ??= '';
    $label ??= $name;
    $class ??=null;
@endphp
<div @class(['form-group'])>
{{--@selected($bien_terrain->zone == $v->name) {{ old($name, $zone_data->value == $bien_terrain->zone ? 'selected' : null ) }}  @selected( old($name) == $v->value)--}}

    <label class="label" for="{{ $name }}">{{ $label }}</label>

    <select name="{{$name}}" id="{{$name}}" class="form-control">

        @foreach( $value as $zone_data )
            <option class="w-full" value="{{ $zone_data->value }}" @selected( old($name) == $zone_data->value ) > {{ $zone_data->name }}</option>
        @endforeach
    </select>

    <p @class(['text-sm text-danger'])>
        @error($name)
        {{ __($message) }}
        @enderror
    </p>
</div>
