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

        <select name="{{$name}}[]" id="{{ $id }}" class="form-control" multiple="multiple">

            @foreach( $datas as $v => $k )

                <option class="w-full" value="{{ $v }}"  @selected(  $bien->specificities->contains($v) ) > {{ old($name, $k) }}</option>
            @endforeach
        </select>
    @else

        <select name="{{$name}}" id="{{ $id }}" class="form-control">

            @foreach( $datas as $v1 =>  $k1 )

                <option class="w-full" value="{{ $v1 }}" @selected(  $bien->specificities->contains($v1) ) > {{ old($name, $k1) }}</option>
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
