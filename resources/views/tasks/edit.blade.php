<x-layout title="Edit task item">
    <div class="flex flex-col items-center w-96 pt-12">
        <h1 class="text-2xl font-bold">Edit task item: {{ $task->task_name }}</h1>
        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('Put')
            <x-form.input name="task_name" :value="old('name', $task->task_name)" autocomplete="off" labelName="name" />
            <x-form.textarea name="task_description" labelName="description">
                {{ old('task_description', $task->task_description) }}
            </x-form.textarea>
            <x-form.select name="status_id" :value="old('status_id', $task->status_id)" labelName="status" />
            <x-form.submit>Save</x-form.submit>
        </form>
    </div>
</x-layout>
