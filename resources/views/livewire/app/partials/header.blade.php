<?php

use function Livewire\Volt\{state};

state([
    'data' => 'hẹ hẹ hẹ, đây là header'
]);

?>

<div>
    {{ $data }}
</div>
