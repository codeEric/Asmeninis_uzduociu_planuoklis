@props(['name', 'type' => 'text', 'value' => null, 'labelName' => null])

<x-form.field>
    <x-form.label name="{{ $name }}" :labelName=$labelName />

    <input
        class="peer h-10 w-full rounded-md bg-gray-50 px-4 font-thin outline-none drop-shadow-sm transition-all duration-200 ease-in-out focus:bg-blue focus:drop-shadow-lg"
        name="{{ $name }}" id="{{ $name }}" type="{{ $type }}"
        {{ $attributes(['value' => $value ?? old($name)]) }} />

    <x-form.error name="{{ $name }}" />
</x-form.field>
