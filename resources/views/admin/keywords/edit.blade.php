<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <h1>Edit {{$keyword->name}}</h1>

    <form action="{{route('admin.keywords.update',$keyword->id)}}" method="POST">
        @method('PUT')
        @csrf

        <x-form-text-input name="name" label="Name*" placeholder="Name" value="{{$keyword->name}}" />
        <button type="submit" class="border border-2 rounded padding-1">Save changes</button>
    </form>

    </div>
</x-layouts::app>
