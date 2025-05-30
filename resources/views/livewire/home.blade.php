<?php
    use function Livewire\Volt\{state, title, on};

    $slideData = [
        [
            'title' => 'New Arrivals',
            'button_text' => 'Shop Now',
            'button_link' => '#',
            'image' => 'https://via.placeholder.com/1200x400?text=New+Arrivals+Banner',
        ],
        [
            'title' => 'Winter Collection',
            'button_text' => 'Explore Now',
            'button_link' => '#',
            'image' => 'https://via.placeholder.com/1200x400?text=Winter+Collection',
        ],
        [
            'title' => 'Summer Sale',
            'button_text' => 'Shop Sale',
            'button_link' => '#',
            'image' => 'https://via.placeholder.com/1200x400?text=Summer+Sale',
        ],
    ];

    state([
        'slides' => $slideData,
        'currentSlide' => 0,
    ]);

    title("Home");

    $nextSlide = fn() => $this->currentSlide = ($this->currentSlide + 1) % count($this->slides);
    $prevSlide = fn() => $this->currentSlide = ($this->currentSlide - 1 + count($this->slides)) % count($this->slides);
    $goToSlide = fn($index) => $this->currentSlide = $index;
?>

<div>
    <flux:main container="true">
        <div class="relative w-full h-[400px] overflow-hidden">
            <div id="slider" class="flex transition-transform duration-500 ease-in-out" style="transform: translateX(-{{ $currentSlide * 100 }}%);">
                @foreach ($slides as $index => $slide)
                    <div class="w-full flex-shrink-0 h-[400px] bg-cover bg-center relative" style="background-image: url('{{ $slide['image'] }}')">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center flex-col">
                            <h1 class="text-5xl font-bold text-white mb-4">{{ $slide['title'] }}</h1>
                            <a href="{{ $slide['button_link'] }}" class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-600 transition">{{ $slide['button_text'] }}</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <button wire:click="prevSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full hover:bg-opacity-75">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button wire:click="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full hover:bg-opacity-75">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                @foreach ($slides as $index => $slide)
                    <span wire:click="goToSlide({{ $index }})" class="dot w-3 h-3 bg-white rounded-full cursor-pointer {{ $currentSlide === $index ? 'bg-opacity-100' : 'bg-opacity-50' }}"></span>
                @endforeach
            </div>
        </div>
    </flux:main>
</div>

@script
    <script>
        setInterval(() => {
            $wire.nextSlide()
        }, 2500);
    </script>
@endscript
