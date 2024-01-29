<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Filament\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Artisan;
use Filament\Notifications\Notification;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use SensioLabs\AnsiConverter\AnsiToHtmlConverter;
use SensioLabs\AnsiConverter\Theme\SolarizedTheme;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Filament\Forms\Form;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\BufferedOutput;

class Artisangui extends Component
{
    // public ?array $loadCommandData = [];
    public $selectedCommand;
    public $formData = [];
    public $description;
    public $synopsis;
    public $arguments = [];
    public $options = [];
    // public function loadCommandform(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             // TextInput::make(),
    //         ])->statePath('loadCommandData');
    // }
    public function updatedselectedCommand()
    {
        // dd($this->loadCommandform->getState());
        $command = Artisan::all()[$this->selectedCommand];
        // $this->cmdName = $command->getName();
        $this->description = $command->getDescription();
        $this->synopsis = $command->getSynopsis();
        $this->arguments = $this->argumentsToArray($command);
        $this->options = $this->optionsToArray($command);
        // dd($this->options);
        // echo '<pre>';
        // print_r($this->options);
    }
    protected function argumentsToArray(Command $command): ?array
    {
        $definition = $command->getDefinition();
        $arguments = array_map(function (InputArgument $argument) {
            return [
                'title' => Str::of($argument->getName())->snake()->replace('_', ' ')->title()->__toString(),
                'name' => $argument->getName(),
                'description' => $argument->getDescription(),
                'default' => empty($default = $argument->getDefault()) ? null : $default,
                'required' => $argument->isRequired(),
                'array' => $argument->isArray(),
            ];
        }, $definition->getArguments());
        return empty($arguments) ? null : $arguments;
    }
    protected function optionsToArray($command): ?array
    {
        $definition = $command->getDefinition();
        $options = array_map(function (InputOption $option) {
            return [
                'title' => Str::of($option->getName())->snake()->replace('_', ' ')->title()->__toString(),
                'name' => $option->getName(),
                'description' => $option->getDescription(),
                'shortcut' => $option->getShortcut(),
                'required' => $option->isValueRequired(),
                'array' => $option->isArray(),
                'accept_value' => $option->acceptValue(),
                'default' => empty($default = $option->getDefault()) ? null : $default,
            ];
        }, $definition->getOptions());
        return empty($options) ? null : $options;
    }
    public function run()
    {
        dd($this->formData);
        // $this->reset();
    }
    public function render(): View
    {
        return view('livewire.artisangui', [
            'artisanlists' => Artisan::all(),
        ]);
    }
}
