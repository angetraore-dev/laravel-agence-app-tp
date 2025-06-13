@php
    $value ??= null;
    $name ??= null;
    $id ??= $name;
    $label ??= $name;
    $type ??= 'text';
    $class ??= null;
    $div_group_class ??= null;
@endphp
<div @class([$div_group_class])>

    <label class="label" for="{{ $name }}">{{ $label }}</label>

    @if($type == 'textarea')
        <textarea @class(['form-control', $class]) name="{{$name}}" id="{{$name}}" class="form-control">
            {{old($name, $value)}}
        </textarea>
    @else
        <input type="{{$type}}" @class(['form-control', $class])  name="{{$name}}" id="{{$name}}" value="{{old($name, $value)}}" />
    @endif
    <p @class(['text-sm text-danger'])>
        @error($name)
        {{ __($message) }}
        @enderror
    </p>
</div>
