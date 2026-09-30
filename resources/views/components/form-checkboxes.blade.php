@props(['name', 'label', 'values' => [], 'options'])

<div style="margin-bottom: 1rem;">
    <label for="{{$name}}"><b>{{$label}}</b></label><br>
    @foreach($options as $option)
        <input name="{{$name}}[]" type="checkbox" value="{{$option->id}}" @checked(in_array($option->id, $values)) >{{$option->name}}
    @endforeach
    @error($name) <div style="color: red;">{{$message}} </div>  @enderror
</div>
