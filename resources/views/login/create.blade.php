<x-layout title="Login" :showNav="false">
    <div class="flex flex-col items-center justify-center h-full">
        <div class="w-full border border-gray-200 p-6 rounded-xl drop-shadow-md">
            <form action="/login" method="POST">
                @csrf
                <x-form.input type="email" name="email" autocomplete="off" />
                <x-form.input type="password" name="password" />
                <x-form.submit>
                    Log In
                </x-form.submit>
                <p class=mt-3>
                    Not registered?
                    <a href="/register" class="text-blue-400 underline">Register here</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>
