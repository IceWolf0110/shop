@props([
    'title' => $title ?? config('app.name')
])

<x-layouts.auth.layout :title="$title">
    {{ $slot }}
</x-layouts.auth.layout>
