@props(['name', 'labelName' => null])
<label for="{{ $name }}"
    class="block w-full pb-1 text-sm font-bold text-gray-500 transition-all duration-200 ease-in-out group-focus-within:text-blue-400">
    {{ ucfirst($labelName ?? $name) }}
</label>
