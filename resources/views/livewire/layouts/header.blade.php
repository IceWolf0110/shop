@php
    use function Livewire\Volt\{state};
@endphp

<div>
    <flux:header sticky="true" container="true"
        class="flex items-center bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>
        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item href="{{ route('home') }}" :current="Route::is('home')">Home</flux:navbar.item>
            <flux:navbar.item href="{{ route('contact') }}" :current="Route::is('contact')">Contact</flux:navbar.item>
        </flux:navbar>
        <flux:spacer/>
        <flux:dropdown x-data align="end" class="me-4">
            <flux:button variant="subtle" square="true" class="group" aria-label="Preferred color scheme">
                <flux:icon.sun x-show="$flux.appearance === 'light'" variant="mini" class="text-zinc-500 dark:text-white" />
                <flux:icon.moon x-show="$flux.appearance === 'dark'" variant="mini" class="text-zinc-500 dark:text-white" />
                <flux:icon.moon x-show="$flux.appearance === 'system' && $flux.dark" variant="mini" />
                <flux:icon.sun x-show="$flux.appearance === 'system' && ! $flux.dark" variant="mini" />
            </flux:button>

            <flux:menu>
                <flux:menu.item icon="sun" x-on:click="$flux.appearance = 'light'">Light</flux:menu.item>
                <flux:menu.item icon="moon" x-on:click="$flux.appearance = 'dark'">Dark</flux:menu.item>
                <flux:menu.item icon="computer-desktop" x-on:click="$flux.appearance = 'system'">System</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
        <flux:dropdown position="top" align="start">
            <flux:profile name="Caleb Porzio" avatar="https://fluxui.dev/img/demo/user.png"/>
            <flux:menu>
                <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group>
                <flux:menu.separator/>
                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    <flux:sidebar stashable="true" sticky="true"
        class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>
        <flux:navlist variant="outline">
            <flux:navlist.item href="{{ route('home') }}" :current="Route::is('home')">Home</flux:navlist.item>
            <flux:navlist.item href="{{ route('contact') }}" :current="Route::is('contact')">Contact</flux:navlist.item>
        </flux:navlist>
    </flux:sidebar>
</div>
