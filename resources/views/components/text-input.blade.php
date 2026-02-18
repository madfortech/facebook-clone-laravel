@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-purple-300 dark:border-purple-700 dark:bg-gray-900 dark:text-gray-300 focus:border-purple-500 dark:focus:border-purple-600 focus:ring-purple-500 dark:focus:ring-purple-600 rounded-md shadow-sm']) }}>
