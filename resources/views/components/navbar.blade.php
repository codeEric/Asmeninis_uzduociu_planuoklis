<header class="flex-initial">
    <nav class="flex flex-wrap items-center justify-between py-2 w-full md:py-0 px-4 text-lg text-gray-700 bg-white">
        <div class="w-1/3">
            <a href="/tasks">
                Personal Task Planner
            </a>
        </div>
        <div class="w-1/3 flex justify-center items-center" id="menu">
            <ul class="text-base text-gray-700 flex items-center">
                <li>
                    <a class="md:p-4 py-2 block hover:text-blue-400" href="/tasks">Your tasks</a>
                </li>
                <li>
                    <a class="md:p-4 py-2 block hover:text-blue-400" href="/tasks/create">Create task</a>
                </li>
                <li>
                    <a class="md:p-4 py-2 block hover:text-blue-400" href="/statuses">Statuses</a>
                </li>
                <li>
                    <a class="md:p-4 py-2 block hover:text-blue-400" href="/statuses/create">Create status</a>
                </li>
            </ul>
        </div>
        <div class="w-1/3 flex justify-end">
            @guest
                <a class="md:p-4 py-2 block text-blue-400 hover:text-blue-600" href="/login">Login</a>
            @endguest
            @auth
                <div>
                    <form id="logout-form" method="POST" action="/logout">
                        @csrf
                        <button class="md:p-4 py-2 block text-red-400 hover:text-red-600">{{ __('Log out') }}</button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>
</header>
