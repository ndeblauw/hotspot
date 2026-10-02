@props(['name', 'label', 'value' => '', 'options'])

<div style="margin-bottom: 1rem;">
    <label for="{{$name}}"><b>{{$label}}</b></label><br>
    @foreach($options as $key => $title)
        <input name="{{$name}}" type="radio" value="{{$key}}" @checked(old($name, $value) == $key) >{{$title}}
    @endforeach
    @error($name) <div style="color: red;">{{$message}} </div>  @enderror
</div>
