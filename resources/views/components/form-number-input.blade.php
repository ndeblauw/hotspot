@props(['name', 'label', 'placeholder' => '', 'value' => ''])

<div style="margin-bottom: 1rem;">
    <label for="{{$name}}"><b>{{$label}}</b></label><br>
    <input type="number" name="{{$name}}" placeholder="{{$placeholder}}" value="{{old($name, $value)}}">
    @error($name) <div style="color: red;">{{$message}} </div>  @enderror
</div>
