<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blue-500 dark:bg-black-200 border border-dark-300 rounded-md font-semibold text-xs text-dark dark:text-gray-800 uppercase tracking-widest hover:bg-gray-500 dark:hover:bg-gray-500 focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-900']) }}>
    {{ $slot }}
</button>
