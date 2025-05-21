@php
    $value ??='';
    $name ??= '';
    $label ??= $name;
    $class ??=null;
    $multiple ??= null;
@endphp
<div @class(['form-group'])>

    <label class="label" for="{{ $name }}">{{ $label }}</label>

    <select name="{{$name}}[]" id="{{$name}}" class="form-control" multiple="{{$multiple}}">

        @foreach( $value as $v =>  $k )

            <option class="w-full" value="{{ $v }}"  @selected(  $property->options->contains($v) ) > {{ old($name, $k) }}</option>
        @endforeach

    </select>
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
