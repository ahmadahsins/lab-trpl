@props(['disabled' => false, 'error' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300' . ($error ? ' border-red-500 focus:border-red-500 focus:ring-red-200' : '')
]) !!}>{{ $slot }}</textarea>
