<x-layout title="Edit status">
    <div class="flex flex-col items-center w-96 pt-12">
        <h1 class="text-2xl font-bold">Edit status: {{ $status->status }}</h1>
        <form action="/statuses/{{ $status->id }}" method="POST">
            @csrf
            @method('Put')
            <x-form.input name="name" :value="old('name', $status->name)" autocomplete="off" />
            <x-form.submit>Save</x-form.submit>
        </form>
    </div>
</x-layout>
