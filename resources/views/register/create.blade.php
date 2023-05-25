<x-layout title="Register" :showNav="false">
    <div class="flex flex-col items-center justify-center h-full">
        <div class="w-full border border-gray-200 p-6 rounded-xl drop-shadow-md">
            <form action="/register" method="POST">
                @csrf
                <x-form.input name="name" autocomplete="off" />
                <x-form.input type="email" name="email" autocomplete="off" />
                <x-form.input type="password" name="password" />
                <x-form.submit>
                    Register
                </x-form.submit>
                <p class=mt-3>
                    Already registered?
                    <a href="/login" class="text-blue-400 underline">Login here</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>
