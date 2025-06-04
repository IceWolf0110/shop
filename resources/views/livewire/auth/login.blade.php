<?php

    use Illuminate\Validation\ValidationException;
    use function Livewire\Volt\{state, layout, rules};

    layout('components.layouts.auth');

    state([
        'email' => '',
        'password' => '',
        'remember' => false,
    ]);

    rules([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $login = function () {
        $validated = $this->validate();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        Session::regenerate();
        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

?>

<div class="flex flex-col gap-6">
    <x-auth.auth-header
        :title="__('Đăng nhập vào tài khoản')"
        :description="__('Sử dụng email và mật khẩu để đăng nhập')"
    />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="__('Mật khẩu')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Mật khẩu của bạn')"
                viewable
            />

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Ghi nhớ')" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Đăng nhập') }}</flux:button>
        </div>
    </form>
</div>
