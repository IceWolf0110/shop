# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Laravel 12 application using Livewire Volt (functional API), Livewire Flux UI components, and Tailwind CSS v4. The project uses Bun as the package manager and Vite for asset compilation.

## Essential Commands

### Development
```bash
# Start full development environment (Laravel server, Vite, queue worker, log monitoring)
composer dev

# Individual services if needed:
php artisan serve              # Laravel dev server
bun run dev                    # Vite dev server only
php artisan queue:listen       # Queue worker
php artisan pail               # Real-time log viewer
```

### Build & Testing
```bash
# Build production assets
bun run build

# Run tests
composer test

# Code formatting
./vendor/bin/pint              # Format PHP code to Laravel standards
```

### Common Laravel Commands
```bash
php artisan migrate            # Run database migrations
php artisan tinker            # Interactive PHP shell
php artisan cache:clear       # Clear application cache
php artisan config:clear      # Clear config cache
php artisan view:clear        # Clear compiled views
```

## Architecture & Patterns

### Livewire Volt Functional Components

This project uses Livewire Volt's functional API instead of class-based components. Components are defined in `resources/views/livewire/` with this pattern:

```php
<?php
use function Livewire\Volt\{state, computed, title};

state(['count' => 0]);

$increment = fn () => $this->count++;

title("Page Title");
?>

<div>
    <!-- Component template -->
</div>
```

Routes are defined using Volt in `routes/web.php`:
```php
Volt::route('/path', 'folder.component-name')->name('route.name');
```

### Directory Structure

- **Livewire Components**: `resources/views/livewire/` - Volt functional components
  - `app/` - Main application components
  - `app/partials/` - Reusable component parts (header, footer)
- **Blade Components**: `resources/views/components/` - Traditional Blade components
  - `layouts/` - Layout templates
- **Routes**: `routes/web.php` - All Volt route definitions
- **Public Assets**: `public/videos/` - Video files for backgrounds

### Tailwind CSS v4

Using the new Tailwind CSS v4 with Vite plugin. Custom theme extensions are in `resources/css/app.css`:
- Custom animations: `title-glow`, `text-shadow-blue`
- Theme colors and typography configured inline

### Livewire Flux UI

The project uses Livewire Flux for modern UI components. Flux scripts are loaded in the main layout via `@fluxScripts`.

## Key Implementation Details

1. **Single Page Application**: Currently configured as a video-background homepage with dynamic header navigation
2. **Dynamic Route Listing**: Header component automatically lists all available routes
3. **Gaming/Tech Theme**: M-SCI branding with glitch effects and blue glow animations
4. **No Authentication**: Auth system was recently removed to simplify architecture

## Database

Default SQLite configuration. Database file: `database/database.sqlite`

To create a new migration:
```bash
php artisan make:migration create_table_name
```

## Testing Approach

PHPUnit is configured. Tests go in `tests/` directory:
- `tests/Feature/` - Feature/integration tests
- `tests/Unit/` - Unit tests

Run specific test:
```bash
php artisan test --filter TestClassName
php artisan test tests/Feature/SpecificTest.php
```