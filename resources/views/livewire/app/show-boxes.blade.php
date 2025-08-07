<?php

    use function Livewire\Volt\{state, mount, title};

    title('show boxes');

    // Define component state
    state([
        'visibleBoxes' => [],
        'totalBoxes' => 24,
        'newlySpawned' => [],
        'colors' => [
            'bg-red-400', 'bg-blue-400', 'bg-green-400', 'bg-yellow-400',
            'bg-purple-400', 'bg-pink-400', 'bg-indigo-400', 'bg-orange-400'
        ]
    ]);

    // Reveal next box function
    $revealNextBox = function () {
        if (count($this->visibleBoxes) === $this->totalBoxes) {
           $this->redirectIntended(default: route('home'), navigate: true);
        }

        // Find the next box to reveal (in order)
        $nextBoxIndex = count($this->visibleBoxes);

        // Add the next box to visible array and mark as newly spawned
        $this->visibleBoxes[] = $nextBoxIndex;
        $this->newlySpawned[] = $nextBoxIndex;

        // Dispatch event for animation cleanup
        $this->dispatch('box-spawned', boxIndex: $nextBoxIndex);
    };

    // Helper functions
    $isBoxVisible = fn($index) => in_array($index, $this->visibleBoxes);
    $getColorClass = fn($index) => $this->colors[$index % count($this->colors)];
?>

<div class="relative">

    <livewire:app.partials.header/>

    <div wire:click="revealNextBox"
         class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 flex flex-col items-center justify-center cursor-pointer select-none p-8">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-white mb-4 drop-shadow-lg">
                Click to Reveal Next Box
            </h1>
            <p class="text-gray-300 text-lg">
                @if(count($visibleBoxes) === $totalBoxes)
                    All boxes revealed! Click to reset
                @else
                    {{ count($visibleBoxes) }} / {{ $totalBoxes }} boxes revealed - Click for next
                @endif
            </p>
        </div>

        <div class="grid grid-cols-6 gap-4 max-w-2xl">
            @for($i = 0; $i < $totalBoxes; $i++)
                @php
                    $class = $this->isBoxVisible($i) ? $this->getColorClass($i) . " scale-100 opacity-100 rotate-0 animate-pulse" : "bg-gray-700 scale-75 opacity-30 rotate-12";
                @endphp
                <div class="w-16 h-16 rounded-lg shadow-lg transform transition-all duration-500 ease-out hover:scale-105 {{ $class }}">
                    @if($this->isBoxVisible($i))
                        <div class="w-full h-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm drop-shadow">
                            {{ $i + 1 }}
                        </span>
                        </div>
                    @endif
                </div>
            @endfor
        </div>

        <div class="mt-8 text-gray-400 text-sm text-center">
            Click anywhere on the background to reveal the next box
        </div>
    </div>
</div>
