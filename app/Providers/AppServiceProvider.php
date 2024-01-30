<?php
namespace App\Providers;
use Livewire\Livewire;
use App\Bsclass\LivewireCommands;
use Livewire\ComponentHookRegistry;
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
        if (class_exists(Livewire::class)) {
            $this->mylivewirecmd(); // this is a my livewire commands add for my project
        }
    }
    protected function mylivewirecmd()
    {
        foreach ([
            LivewireCommands::class
        ] as $feature) {
            app('livewire')->componentHook($feature);
        }
        ComponentHookRegistry::boot();
    }
}
