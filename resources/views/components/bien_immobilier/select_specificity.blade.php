@php
    $datas ??= false;
    $name ??= '';
    $id ??= $name;
    $label ??= $name;
    $class ??= '';
    $multiple ??= '';
@endphp

<div @class(['form-group'])>


    <label class="label" for="{{ $name }}">{{ $label }}</label>

    @if( !empty($multiple) )
{{--[]--}}
        <select name="{{  $name }}" id="{{ $id }}" class="form-control" multiple="multiple">

            @foreach( $datas as $key => $key_value )

                <option class="w-full" value="{{ $key }}"   @selected(  $bien->specificities->contains($key) ) > {{ $key_value }}</option>
            @endforeach
        </select>
    @else


        <select name="{{$name}}" id="{{ $id }}" class="form-control">
            @foreach( $datas as $key =>  $key_value )

                <option class="w-full" value="{{ $key }}" @selected( $bien->specificities->contains($key) ) > {{ $key_value }}</option>
            @endforeach

        </select>
    @endif

    <p @class(['text-sm text-danger'])>
        @error($name)
        {{ __($message) }}
        @enderror
    </p>
</div>

{{--
 <script>
    let settings = {plugins: { remove_button: {title: 'supprimer'} } }
    new TomSelect("select[multiple]", {plugins: { remove_button: {title: 'supprimer'} } });
</script>
 --}}
