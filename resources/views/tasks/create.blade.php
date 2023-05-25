<x-layout title="Create new task">
    <div class="flex flex-col items-center w-full pt-12">
        <h1 class="text-2xl font-bold">Create new task</h1>
        <form action="/tasks" method="POST">
            @csrf
            <x-form.input name="task_name" labelName="task" autocomplete="off" />
            <x-form.textarea name="task_description" labelName="description" />
            <x-form.select name="status_id" labelName="status" />
            <x-form.submit>Create</x-form.submit>

        </form>
</x-layout>
