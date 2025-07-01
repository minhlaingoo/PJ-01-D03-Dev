<div class="space-y-4">

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Total Users --}}
        <mijnui:card>
            <mijnui:card.header>
                <span
                    class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-accent text-white text-lg">
                    <i class="fa-solid fa-users"></i>
                </span>
            </mijnui:card.header>
            <mijnui:card.content>
                <p class="text-sm font-medium text-gray-500">Total Users</p>
                <h3 class="text-2xl font-semibold text-gray-800">{{ $totalUser ?? 0 }}</h3>
                <p class="text-xs text-success">+1 from this month</p>
            </mijnui:card.content>
        </mijnui:card>

        {{-- Total Roles --}}
        <mijnui:card>
            <mijnui:card.header>
                <span
                    class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-accent text-white text-lg">
                    <i class="fa-solid fa-layer-group"></i>
                </span>
            </mijnui:card.header>
            <mijnui:card.content>
                <p class="text-sm font-medium text-gray-500">Total Roles</p>
                <h3 class="text-2xl font-semibold text-gray-800">{{ $totalRole ?? 0 }}</h3>
                <p class="text-xs text-success">+1 from this month</p>
            </mijnui:card.content>
        </mijnui:card>

        {{-- Total Devices --}}
        <mijnui:card>
            <mijnui:card.header>
                <span
                    class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-accent text-white text-lg">
                    <i class="fa-regular fa-hard-drive"></i>
                </span>
            </mijnui:card.header>
            <mijnui:card.content>
                <p class="text-sm font-medium text-gray-500">Total Devices</p>
                <h3 class="text-2xl font-semibold text-gray-800">0</h3>
            </mijnui:card.content>
        </mijnui:card>

        {{-- Total Protocols --}}
        <mijnui:card>
            <mijnui:card.header>
                <span
                    class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-accent text-white text-lg">
                    <i class="fa-solid fa-code-pull-request"></i>
                </span>
            </mijnui:card.header>
            <mijnui:card.content>
                <p class="text-sm font-medium text-gray-500">Total Protocols</p>
                <h3 class="text-2xl font-semibold text-gray-800">0</h3>
            </mijnui:card.content>
        </mijnui:card>
    </div>

    {{-- Current Device Select --}}
    <div>
        <mijnui:card>
            <div class="flex items-center gap-4">
                <p class="font-medium ">Current Device</p>
                <mijnui:select class="w-64" wire:model="selectedDevice" placeholder="Select a device">
                    <mijnui:select.option value="device1">Device 1</mijnui:select.option>
                    <mijnui:select.option value="device2">Device 2</mijnui:select.option>
                </mijnui:select>
            </div>
        </mijnui:card>
    </div>

    {{-- Charts Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

        {{-- Chamber Volume List --}}
        <mijnui:card>
            <mijnui:card.header>
                <mijnui:card.title class="text-lg font-semibold text-gray-800">Chamber Volume List</mijnui:card.title>
            </mijnui:card.header>
            <mijnui:card.content>
                <livewire:charts.chamber-bar-chart />
            </mijnui:card.content>
        </mijnui:card>

        {{-- Daily Protocol Monitoring --}}
        <mijnui:card>
            <mijnui:card.header>
                <mijnui:card.title class="text-lg font-semibold text-gray-800">Daily Protocol Monitoring
                </mijnui:card.title>
            </mijnui:card.header>
            <mijnui:card.content>
                <livewire:charts.daily-protocol-line-chart />
            </mijnui:card.content>
        </mijnui:card>

        {{-- Daily Volume Usage (with Select) --}}
        <mijnui:card>
            <mijnui:card.header>
                <p class="text-lg font-semibold text-gray-800">Daily Volume Usage</p>
                <mijnui:select class="w-48" wire:model="selectedChamber" placeholder="Select a chamber">
                    <mijnui:select.option value="Chamber1">Chamber 1</mijnui:select.option>
                    <mijnui:select.option value="Chamber2">Chamber 2</mijnui:select.option>
                </mijnui:select>
            </mijnui:card.header>
            <mijnui:card.content>
                <livewire:charts.daily-chamber-volume-usage-chart />
            </mijnui:card.content>
        </mijnui:card>

        {{-- Sample Pie Chart --}}
        <mijnui:card class="h-96">
            <mijnui:card.header>
                <mijnui:card.title class="text-lg font-semibold text-gray-800">Sample Pie Chart</mijnui:card.title>
            </mijnui:card.header>
            <mijnui:card.content>
                <livewire:charts.sample-pie-chart />
            </mijnui:card.content>
        </mijnui:card>
    </div>

    {{-- Livewire Sensor Log --}}
    <div>
        <livewire:sensors.log />
    </div>

</div>
