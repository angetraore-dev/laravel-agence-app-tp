@php
    $name ??= '';
    $label ??= $name;
    $class ??= null;
    $value ??= 0;
@endphp

<span @class(['flex gap-6'])>

    <label for="{{$name}}">{{ $label }}</label>

    <input @class([$class]) type="hidden" name="{{$name}}" value="0">

    <input @class([$class]) type="checkbox" name="{{$name}}" id="{{$name}}" value="1" role="switch"
           @checked(old($name, $value ?? false))
    >

</span>
<p @class(['text-sm text-danger'])>
    @error($name)
    {{ __($message) }}
    @enderror
</p>
