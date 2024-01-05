<ul class=" text-sm font-medium text-center text-gray-500 rounded-lg shadow-2xl flex dark:divide-gray-700 dark:text-gray-400">
    <li class="w-full">
        <a href="/status" class="{{ request()->is('status') ? 'inline-block w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 active focus:outline-none dark:bg-gray-700 dark:text-white' : 'inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700'}}">All items</a>
    </li>
    <li class="w-full">
        <a href="/status/receive" class="{{ request()->is('status/receive') ? 'inline-block w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 active focus:outline-none dark:bg-gray-700 dark:text-white' : 'inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700'}}">Receive</a>
    </li>
    <li class="w-full">
        <a href="#" class="{{ request()->is('status/dispatch') ? 'inline-block w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 active focus:outline-none dark:bg-gray-700 dark:text-white' : 'inline-block w-full p-4 bg-white border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700'}}">Dispatch</a>
    </li>
</ul>
