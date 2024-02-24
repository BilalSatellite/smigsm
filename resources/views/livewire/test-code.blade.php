<div>

    <x-filament::input.wrapper>
        <x-filament::input.select wire:model.live="getfor">
            @foreach ($attributeIcs as $attributeIc)
                <option value="{{ $attributeIc->name }}">{{ $attributeIc->name }}</option>
            @endforeach
        </x-filament::input.select>
    </x-filament::input.wrapper>


    @if ($this->seletedattributes)
        @foreach ($this->seletedattributes as $key => $attributeIc)
            @foreach ($attributeIc->values as $value)
                <p>{{ $value }}</p>
            @endforeach
        @endforeach
    @endif
    {{ $data }}
    {{-- @foreach ($tests['values'] as $value)
            <p>{{ $value }}</p>
        @endforeach
</div> --}}
