@props(['name', 'value' => null, 'labelName' => null, 'selectable' => false])
<x-form.field>
    <div class="w-full">
        <div class="col-span-6 sm:col-span-4">
            <x-form.label name="{{ $name }}" :labelName=$labelName />
            <select id="{{ $name }}" name="{{ $name }}"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-400 focus:border-blue-400 sm:text-sm">
                <option value="" {{ !$selectable ? 'disabled' : '' }} {{ $value == null ? 'selected' : '' }}>
                    -- Select status --
                </option>
                @foreach (\App\Models\Status::all() as $status)
                    <option value="{{ $status->id }}" {{ $value == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <x-form.error name="{{ $name }}" />
</x-form.field>
