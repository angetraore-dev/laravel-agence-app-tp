@php
    $value ??='';
    $name ??= '';
    $label ??= $name;
    $class ??=null;
    $multiple ??= false;
@endphp
<div @class(['form-group'])>

    <label class="label" for="{{ $name }}">{{ $label }}</label>

    @if($multiple == 'multiple')
        <select name="{{$name}}[]" id="{{$name}}" class="form-control" multiple="{{$multiple}}">

            @foreach( $value as $v =>  $k )

                <option class="w-full" value="{{ $v }}"  @selected(  $property->options->contains($v) ) > {{ old($name, $k) }}</option>
            @endforeach

        </select>

    @else

        <select name="{{$name}}" id="{{$name}}" class="form-control">

            @foreach( $value as $v )

                <option class="w-full" value="{{ $v }}" @selected(  $property->options->contains($v) ) > {{ old($name, $v) }}</option>
            @endforeach

        </select>

    @endif

    <p @class(['text-sm text-danger'])>
        @error($name)
        {{ __($message) }}
        @enderror
    </p>
</div>
