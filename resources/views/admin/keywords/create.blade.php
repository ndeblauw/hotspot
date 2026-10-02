<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <h1>Create new keyword</h1>
    <form action="{{route('admin.keywords.store')}}" method="POST">

        @csrf

        <x-form-text-input name="name" label="Name*" placeholder="Name" />

        <button type="submit" class="border border-2 rounded padding-1">Create keyword</button>
    </form>

    </div>
</x-layouts::app>
