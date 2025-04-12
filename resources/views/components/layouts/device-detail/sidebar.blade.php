<mijnui:sidebar>
    <mijnui:sidebar.header>
        Device Detail
    </mijnui:sidebar.header>
    <!-- --------------------------- Sidebar Content --------------------------- -->
    <mijnui:list class="w-full">
        <mijnui:list.item href="{{ route('devices.detail') }}" active="{{ request()->routeIs('devices.detail') }}"
            wire:navigate>
            Dashboard
        </mijnui:list.item>

        <mijnui:list.item href="{{ route('devices.sensors') }}" active="{{ request()->routeIs('devices.sensors') }}"
            wire:navigate>
            Sensors
        </mijnui:list.item>
        
        <mijnui:list.item href="{{ route('devices.logs') }}" active="{{ request()->routeIs('devices.logs') }}"
            wire:navigate>
            Logs
        </mijnui:list.item>
        
        <mijnui:list.item href="{{ route('devices.setting') }}" active="{{ request()->routeIs('devices.setting') }}"
            wire:navigate>
            Settings
        </mijnui:list.item>

    </mijnui:list>

</mijnui:sidebar>
<div>
    {{ $slot }}
</div>
