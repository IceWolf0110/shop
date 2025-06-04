@props([
    'title' => $title ?? config('app.name')
])

<x-layouts.admin.layout :title="$title">
    {{ $slot }}
</x-layouts.admin.layout>
