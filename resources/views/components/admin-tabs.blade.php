<ul
    class=" text-sm border rounded-2xl font-medium text-center text-gray-500 p-1 shadow-2xl flex dark:divide-gray-700 dark:text-gray-400">
    <li class="w-full">
        <a href="/allorder"
            class="{{ request()->is('allorder') ? 'inline-block rounded-lg w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 active focus:outline-none dark:bg-gray-700 dark:text-white' : 'inline-block w-full rounded-lg p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700' }}">All
            Orders</a>
    </li>
    <li class="w-full">
        <a href="/archiveorder"
            class="{{ request()->is('archiveorder') ? 'inline-block rounded-lg w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 active focus:outline-none dark:bg-gray-700 dark:text-white' : 'inline-block rounded-lg w-full p-4 bg-white border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700' }}">Archived
            Orders</a>
    </li>
</ul>
