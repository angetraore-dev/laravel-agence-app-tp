@php
$value ??= null;
$name ??= null;
$label ??= $name;
$type ??= 'text';
$class ??=null;
@endphp
<!-- form-group est en grid: flex flex-col w-full md:grid grid-cols-1 mb-4 -->

<div @class(['form-group'])>
    <label class="label" for="{{ $name }}">{{ $label }}</label>
    @if($type == 'textarea')
        <textarea class="form-control" name="{{$name}}" id="{{$name}}" class="form-control">
        {{old($value, '')}}
    </textarea>
    @else
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="form-control" value="{{old($value, '')}}" />
    @endif
    <p @class(['text-sm text-danger'])>
        @error($name)
        {{ __($message) }}
        @enderror
    </p>
</div>
