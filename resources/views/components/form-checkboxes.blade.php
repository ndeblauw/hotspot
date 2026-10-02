@props(['name', 'label', 'values' => [], 'options'])

<div style="margin-bottom: 1rem;">
    <label for="{{$name}}"><b>{{$label}}</b></label><br>
    @foreach($options as $key => $title)
        <input name="{{$name}}[]" type="checkbox" value="{{$key}}" @checked(in_array($key, old($name, $values))) >{{$title}}
    @endforeach
    @error($name) <div style="color: red;">{{$message}} </div>  @enderror
</div>
