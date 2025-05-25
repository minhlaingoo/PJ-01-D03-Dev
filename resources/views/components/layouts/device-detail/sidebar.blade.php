<mijnui:sidebar>
    <mijnui:sidebar.header>
        Device Detail
    </mijnui:sidebar.header>
    <!-- --------------------------- Sidebar Content --------------------------- -->
    <mijnui:list class="w-full">
        <mijnui:list.item href="{{ route('devices.detail', ['id' => request()->route('id')]) }}" active="{{ request()->routeIs('devices.detail') }}"
            wire:navigate>
            Dashboard
        </mijnui:list.item>

        {{-- <mijnui:list.item href="{{ route('devices.sensors') }}" active="{{ request()->routeIs('devices.sensors') }}"
            wire:navigate>
            Sensors
        </mijnui:list.item> --}}

        <mijnui:list.item href="{{ route('devices.logs', ['id' => request()->route('id') ]) }}" active="{{ request()->routeIs('devices.logs') }}"
            wire:navigate>
            Logs
        </mijnui:list.item>

        <mijnui:list.item href="{{ route('devices.setting', ['id' => request()->route('id')]) }}" active="{{ request()->routeIs('devices.setting') }}"
            wire:navigate>
            Settings
        </mijnui:list.item>

        <mijnui:list.item href="{{ route('devices.index') }}" class="self-end" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>

            Main Menu
        </mijnui:list.item>

    </mijnui:list>

</mijnui:sidebar>
<div>
    {{ $slot }}
</div>
