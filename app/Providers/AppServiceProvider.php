<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /** 
         * Filament only saves valid data to models so the models can be unguarded safely.
         *To unguard all Laravel models at once,
         */
        Model::unguard();
        // Check the existence of the Livewire class ..
        $this->mylivewirecmd(); // this is a my livewire commands add for my project
    }
    protected function mylivewirecmd()
    {
        if (app()->runningInConsole()) return;
        static::commands([
            \Livewire\Features\SupportConsoleCommands\Commands\MakeCommand::class,         // livewire:make
            \Livewire\Features\SupportConsoleCommands\Commands\FormCommand::class,         // livewire:form
            \Livewire\Features\SupportConsoleCommands\Commands\AttributeCommand::class,    // livewire:attribute
            \Livewire\Features\SupportConsoleCommands\Commands\CopyCommand::class,         // livewire:copy
            \Livewire\Features\SupportConsoleCommands\Commands\DeleteCommand::class,       // livewire:delete
            \Livewire\Features\SupportConsoleCommands\Commands\LayoutCommand::class,       // livewire:layout
            \Livewire\Features\SupportConsoleCommands\Commands\MoveCommand::class,         // livewire:move
            \Livewire\Features\SupportConsoleCommands\Commands\StubsCommand::class,        // livewire:stubs
            \Livewire\Features\SupportConsoleCommands\Commands\PublishCommand::class,      // livewire:publish
            \Livewire\Features\SupportConsoleCommands\Commands\UpgradeCommand::class,      // livewire:upgrade
            // \Livewire\Features\SupportConsoleCommands\Commands\MakeLivewireCommand::class, // make:livewire
            // \Livewire\Features\SupportConsoleCommands\Commands\TouchCommand::class,        // livewire:touch
            // \Livewire\Features\SupportConsoleCommands\Commands\CpCommand::class,           // livewire:cp
            // \Livewire\Features\SupportConsoleCommands\Commands\RmCommand::class,           // livewire:rm
            // \Livewire\Features\SupportConsoleCommands\Commands\MvCommand::class,           // livewire:mv
            // \Livewire\Features\SupportConsoleCommands\Commands\S3CleanupCommand::class,    // livewire:configure-s3-upload-cleanup
        ]);
    }
}
