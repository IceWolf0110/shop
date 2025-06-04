<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-layouts.admin.head :title="$title"/>
    <body class="min-h-screen antialiased">
        <flux:main container="true">
            {{ $slot }}
        </flux:main>
        @fluxScripts
    </body>
</html>
