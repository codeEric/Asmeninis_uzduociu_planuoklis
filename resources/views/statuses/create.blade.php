<x-layout title="Create new status">
    <div class="flex flex-col items-center w-full pt-12">
        <h1 class="text-2xl font-bold">Create new status</h1>
        <form action="/statuses" method="POST">
            @csrf
            <x-form.input name="name" autocomplete="off" />
            <x-form.submit>Create</x-form.submit>

        </form>
</x-layout>
