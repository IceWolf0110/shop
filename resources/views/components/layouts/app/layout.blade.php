<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-layouts.partials.head :title="$title">
        {{-- Custom head tag in here --}}
    </x-layouts.partials.head>
    <body class="min-h-screen antialiased flex flex-col">
        {{ $slot }}
        @fluxScripts
    </body>
</html>
