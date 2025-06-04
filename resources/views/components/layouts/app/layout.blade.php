<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-layouts.app.head :title="$title"/>
    <body class="min-h-screen antialiased flex flex-col">
        <livewire:app.partials.header/>
        <div class="mt-4 mb-auto">
            <flux:main container="true">
                {{ $slot }}
            </flux:main>
        </div>
        <livewire:app.partials.footer/>
        @fluxScripts
    </body>
</html>
