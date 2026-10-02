@props(['name', 'label', 'placeholder' => '', 'value' => ''])

<div class="mb-4 flex flex-col gap-2">
    <label for="{{$name}}" class="font-label text-label-s text-ink-soft">{{$label}}</label>
    <input
        type="text"
        name="{{$name}}"
        placeholder="{{$placeholder}}"
        value="{{old($name, $value)}}"
        class="w-full rounded-[2px] border border-rule-strong bg-paper px-3.5 py-2.5 text-body-s text-ink placeholder:text-ink-faint transition-colors duration-200 focus:border-ink focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2 focus-visible:ring-offset-paper"
    >
    @error($name) <div class="font-label text-label-s text-accent-pumpkin">{{$message}}</div> @enderror
</div>
