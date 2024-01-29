<div>
    <x-filament::tabs x-data="{ activeTab: 'tab1'}" x-init="$watch('activeTab', value => console.log(value))">
        <x-filament::tabs.item alpine-active="activeTab === 'tab1'" x-on:click="activeTab = 'tab1'">
            Tab 1
        </x-filament::tabs.item>
        <x-filament::tabs.item alpine-active="activeTab === 'tab2'" x-on:click="activeTab = 'tab2'">
            Tab 2
        </x-filament::tabs.item>
        {{--
        <x-filament::tabs.item alpine-active="activeTab === 'tab3'" x-on:click="activeTab = 'tab3'">
            Tab 3
        </x-filament::tabs.item> --}}
        {{-- Other tabs --}}
        <div x-show="tab2">
            Dropdown Contents...
        </div>
    </x-filament::tabs>
</div>