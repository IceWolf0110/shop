<?php
    use function Livewire\Volt\{title};

    title("Home");
?>

<div>
    <div class="relative h-screen w-screen overflow-hidden">
        <video
            class="absolute inset-0 w-screen h-screen object-cover"
            autoplay
            muted
            loop
            playsinline
        >
            <source src="{{ asset('videos/home_bg_video.mp4') }}" type="video/mp4" />
        </video>

        <div class="relative z-1 flex h-full items-center justify-center bg-black/50">
            <livewire:app.partials.header/>
            <div class="text-center transition-all duration-300 transform">
                <h1 class="text-4xl sm:text-6xl md:text-8xl
                    font-extrabold text-white mb-6 uppercase
                    text-shadow-blue animate-title-glow text-glitch tracking-wide">M-SCI</h1>

                <div class="mt-4">
                    <flux:link variant="ghost" class="inline-block no-underline! px-8 py-3 bg-gradient-to-r from-[#8a2be2] to-[#00b4d8]
                        rounded-lg text-white font-bold text-lg hover:scale-105 transition-all duration-300" :href="route('show-boxes')" wire:navigate="true">
                        {{ __('Play now') }}
                    </flux:link>
                </div>
            </div>
        </div>
    </div>
</div>
