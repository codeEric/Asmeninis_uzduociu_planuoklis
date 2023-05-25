<x-layout title="Tasks">
    <div class="h-full flex flex-col items-center pt-3">
        <h1 class="text-3xl font-bold">Your tasks</h1>
        <div class="flex flex-col pt-6">
            <div class="-my-2 overflow-x-auto">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="pb-6">
                        <h1 class="text-xl font-bold">Filter</h1>
                        <form method="POST" action="/tasks/search">
                            @csrf
                            <x-form.select name="status_id" :value="old('status_id', $filter->status_id)" labelName="status" :selectable="true">
                            </x-form.select>
                            <button
                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-3 mt-3 px-8 rounded-md hover:bg-blue-600">
                                Search
                            </button>
                        </form>
                    </div>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                Name
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                Description
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                Status
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                Add date
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                Completed date
                                            </div>
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $task->task_name }}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $task->task_description }}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $task->status->name ?? 'deleted' }}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $task->add_date }}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $task->completed_date ?? 'Not finished' }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/tasks/{{ $task->id }}/edit"
                                                class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/tasks/{{ $task->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-xs text-red-400">Delete</button>
                                            </form>
                                        </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
