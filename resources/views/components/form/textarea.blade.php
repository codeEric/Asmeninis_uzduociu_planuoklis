@props(['name', 'value' => null, 'labelName' => null])

<x-form.field>
    <x-form.label name="{{ $name }}" :labelName=$labelName />

    <textarea
        class="peer w-full h-32 rounded-md bg-gray-50 px-4 font-thin outline-none drop-shadow-sm transition-all duration-200 ease-in-out focus:bg-blue focus:drop-shadow-lg resize-none"
        name="{{ $name }}" id="{{ $name }}" type="text">{{ old($name) ?? $slot }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
