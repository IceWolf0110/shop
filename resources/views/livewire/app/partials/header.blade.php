<?php

    use function Livewire\Volt\{with};

    $routes = Route::getRoutes()->getRoutesByName();

    $routes = array_filter($routes, function ($key) {
        return !preg_match('/(storage|livewire)\./i', $key);
    }, ARRAY_FILTER_USE_KEY);

    $routes = array_keys($routes);

    with(fn () => [
        'routes' => $routes
    ]);
?>

<div class="absolute top-0 w-full">
    <div class="h-20 w-full bg-gradient-to-b from-black/90 to-transparent">
        @if(!empty($routes))
            <flux:main container="true">
                <div class="flex gap-6 container mx-auto items-center">
                    @foreach($routes as $route)
                        <flux:link variant="ghost" class="block no-underline! capitalize
                            {{ Request::route()->getName() == $route ? 'text-blue-500' : '' }}"
                            :href="route($route)" wire:navigate="true"> {{ $route }} </flux:link>
                    @endforeach
                </div>
            </flux:main>
        @endif
    </div>
</div>
