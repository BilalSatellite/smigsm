<div>
    <div class="flex justify-between">
        <input wire:model.live="search" type="search" placeholder="Search" {{-- {{ $modalFormVisible == true ? '' : 'disabled' }} --}}
            class="w-full px-3 py-2 leading-tight border rounded shadow appearance-none " />
    </div>
    {{-- <x-filament::input.wrapper>
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
    {{ $data }} --}}
    {{-- @foreach ($tests['values'] as $value)
            <p>{{ $value }}</p>
        @endforeach
        --}}

    {{-- {{ $data }} --}}
    {{-- @dd($data) --}}

    {{-- @foreach ($data as $i)
        <p>Type:{{ $i->name }}</p>

        <div>
            @foreach ($i->getProcessors as $processors)
                <p>Cpu:{{ $processors->name }}</p>
            @endforeach
        </div>

        @foreach ($i->getPowers as $powers)
            {{ $powers->name }}
        @endforeach
        @foreach ($i->getMemoryes as $memory)
            {{ $memory->name }}
        @endforeach
    @endforeach --}}
    {{-- @dd($data) --}}
    @if ($search)


        @foreach ($data as $a)
            <p>{{ $a->name }}</p>
            <p>{{ $a->brand->name }}</p>
            {{-- @foreach ($a->getProcessors as $p)
            <div class="flex items-center justify-around ">
                <p>{{ $p->name }}</p>
                <p>{{ $p->brand->name }}</p>
                @foreach ($p->Ictypes as $type)
                    <p>{{ $type->name }}</p>
                @endforeach
            </div>
        @endforeach
        @foreach ($a->getPowers as $pw)
            <p>{{ $pw->name }}</p>
            <p>{{ $pw->brand->name }}</p>
        @endforeach
        @foreach ($a->getMemoryes as $m)
            <p>{{ $m->name }}</p>
            <p>{{ $m->brand->name }}</p>
        @endforeach --}}
        @endforeach

        {{-- {{ $data }} --}}
    @else
        Nodata
    @endif

</div>
