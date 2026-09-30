@props([
    'class' => 'size-5',
])

<svg {{ $attributes->merge(['class' => $class]) }} viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <path d="M1 8.5H15M15 8.5L8 1.5M15 8.5L8 15.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
</svg>
