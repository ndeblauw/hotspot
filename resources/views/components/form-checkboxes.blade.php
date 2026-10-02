@props(['name', 'label', 'values' => [], 'options'])

<div class="mb-4 flex flex-col gap-2">
    <label for="{{$name}}" class="font-label text-label-s text-ink-soft">{{$label}}</label>
    <div class="flex flex-wrap gap-x-5 gap-y-2">
        @foreach($options as $key => $title)
            <label class="flex items-center gap-2 text-body-s text-ink">
                <input name="{{$name}}[]" type="checkbox" value="{{$key}}" @checked(in_array($key, old($name, $values))) class="size-4 rounded-[2px] border border-rule-strong text-accent-lime focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2 focus-visible:ring-offset-paper">{{$title}}
            </label>
        @endforeach
    </div>
    @error($name) <div class="font-label text-label-s text-accent-pumpkin">{{$message}}</div> @enderror
</div>
