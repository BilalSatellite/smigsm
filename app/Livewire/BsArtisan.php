<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use SensioLabs\AnsiConverter\AnsiToHtmlConverter;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;

class BsArtisan extends Component
{
    public $selectedCommand;
    public $description;
    public $synopsis;
    public $arguments = [];
    public $options = [];
    public $argumentformData = [];
    public $optionformData = [];
    public $cmdOputput = [];
    public function cmdclick($selectcmd)
    {
        $this->resetValidation();
        $this->selectedCommand = $selectcmd;
        $command = $this->findCommandOrFail($this->selectedCommand);
        $this->description = $command->getDescription();
        $this->synopsis = $command->getSynopsis();
        $this->arguments = $this->argumentsToArray($command);
        $this->options = $this->optionsToArray($command);
        // dd($this->arguments);
        $this->setdefaultvalue();
    }
    public function setdefaultvalue()
    {
        switch ($this->selectedCommand) {
            case 'list':
                $this->optionformData['--format'] = 'txt';
                break;
            case 'help':
                $this->optionformData['--format'] = 'txt';
                break;
            default:
                //code block
        }
    }
    public function run()
    {
        $command = $this->findCommandOrFail($this->selectedCommand);
        if ($command->getDefinition()->getArguments() || $command->getDefinition()->getOptions()) {
            $this->validate();
        }
        $parameters = array_merge($this->argumentformData, $this->optionformData);
        $outputBuffer = new BufferedOutput(
            OutputInterface::VERBOSITY_NORMAL,
            true // true for decorated
        );
        try {
            Artisan::call($command->getName(), $parameters, $outputBuffer);
            $output = $outputBuffer->fetch();
        } catch (\Exception $exception) {
            $output = $exception->getMessage();
        }
        $converter = new AnsiToHtmlConverter();
        $this->cmdOputput = $converter->convert($output);
    }
    protected function rules()
    {
        $command = $this->findCommandOrFail($this->selectedCommand);
        $rules = [];
        foreach ($command->getDefinition()->getArguments() as $argument) {
            $required = $argument->isRequired() ? 'required' : 'nullable';
            $array = $argument->isArray() ? 'array' : 'string';
            $rules['argumentformData.' . $argument->getName()] = $required . "|" . $array;
        }
        foreach ($command->getDefinition()->getOptions() as $option) {
            $name = $option->getName();
            if ($this->selectedCommand == 'make:controller' && $name == 'type') {
                $required = 'nullable';
            } else {
                $required = $option->isValueRequired() ? 'required' : 'nullable';
            }
            $array = $option->isArray() ? 'array' : ($option->acceptValue() ? 'string' : 'bool');
            $rules['optionformData.' . "--{$name}"] = $required . "|" . $array;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'argumentformData.*' => 'This fill is Required.',
            'optionformData.*' => 'This fill is Required.',
        ];
    }
    protected function findCommandOrFail(string $name)
    {
        $commands = Artisan::all();
        if (!in_array($name, array_keys($commands))) {
            abort(404);
        }
        return $commands[$name];
    }
    protected function argumentsToArray($command): ?array
    {
        $definition = $command->getDefinition();
        $arguments = array_map(function ($argument) {
            return [
                'title' => Str::of($argument->getName())
                    ->snake()
                    ->replace('_', ' ')
                    ->title()
                    ->__toString(),
                'name' => $argument->getName(),
                'description' => $argument->getDescription(),
                'default' => empty(($default = $argument->getDefault())) ? null : $default,
                'required' => $argument->isRequired(),
                'array' => $argument->isArray(),
            ];
        }, $definition->getArguments());
        return empty($arguments) ? null : $arguments;
    }
    protected function optionsToArray($command): ?array
    {
        $definition = $command->getDefinition();
        $options = array_map(function ($option) {
            return [
                'title' => Str::of($option->getName())
                    ->snake()
                    ->replace('_', ' ')
                    ->title()
                    ->__toString(),
                'name' => '--' . $option->getName(),
                'description' => $option->getDescription(),
                'shortcut' => $option->getShortcut(),
                'required' => $option->isValueRequired(),
                'array' => $option->isArray(),
                'accept_value' => $option->acceptValue(),
                'default' => empty(($default = $option->getDefault())) ? null : $default,
            ];
        }, $definition->getOptions());
        return empty($options) ? null : $options;
    }
    public function close()
    {
        $this->resetValidation();
        $this->reset(
            'selectedCommand',
            'description',
            'synopsis',
            'arguments',
            'options',
            'argumentformData',
            'optionformData',
            'cmdOputput'
        );
    }
    public function render()
    {
        return view('livewire.bs-artisan', [
            'artisanlists' => config('bs-artisan-gui.commands', []),
        ]);
    }
}
