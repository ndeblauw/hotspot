<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <h1>Edit {{$keyword->name}}</h1>

    <form action="{{route('admin.keywords.update',$keyword->id)}}" method="POST">
        @method('PUT')
        @csrf

        <x-form-text-input name="name" label="Name*" placeholder="Name" value="{{$keyword->name}}" />
        <button type="submit" class="pressable inline-flex w-fit items-center gap-2.5 rounded-[2px] border border-ink bg-accent-lime px-3.5 py-2.5 font-label text-label-m text-ink transition-all duration-[240ms] ease-in-out">Save changes</button>
    </form>

    </div>
</x-layouts::app>
