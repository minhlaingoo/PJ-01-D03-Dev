<div class="grid grid-cols-3 gap-4">
    <mijnui:card>
        <mijnui:card.header class="text-lg font-medium">Device Detail</mijnui:card.header>
        <mijnui:card.content class="text-sm space-y-2">

            <div class="flex items-center">
                <p class="w-24">Device Name</p>
                <p>: ChemiLab</p>
            </div>
            <div class="flex items-center">
                <p class="w-24">Device Model</p>
                <p>: IoT3212</p>
            </div>
            <div class="flex items-center">
                <p class="w-24">Device Status</p>
                <mijnui:badge color="success" size="sm" class="text-xs">Running</mijnui:badge>
            </div>

        </mijnui:card.content>
    </mijnui:card>

    <mijnui:card>
        <mijnui:card.header class="text-lg font-medium">Uptime Monitor</mijnui:card.header>
        <mijnui:card.content class="text-sm space-y-2">

            <div class="flex items-center">
                <p class="w-24">Uptime:</p>
                <p>ChemiLab</p>
            </div>
            <div class="flex items-center">
                <p class="w-24">Running Time:</p>
                <p>36 days</p>
            </div>
            <div class="flex items-center">
                <p class="w-24">Last Online:</p>
                <p>2025-03-21 10:02</p>
            </div>

        </mijnui:card.content>
    </mijnui:card>

    <mijnui:card>
        <mijnui:card.header class="text-lg font-medium">Battery Status</mijnui:card.header>
        <mijnui:card.content class="text-sm space-y-2">
            <div class="flex items-center">
                <p class="w-24">Battery Level:</p>
                <p>86%</p>
            </div>
            <div class="flex items-center">
                <p class="w-24">Status:</p>
                <p>Charging</p>
            </div>
        </mijnui:card.content>
    </mijnui:card>

    {{-- <div class="col-span-2">

        <mijnui:table>
            <mijnui:table.columns>
                <mijnui:table.column>Sensor Name</mijnui:table.column>
                <mijnui:table.column>Status</mijnui:table.column>
                <mijnui:table.column>Created At</mijnui:table.column>
            </mijnui:table.columns>

            <mijnui:table.rows>
                <mijnui:table.row>
                    <mijnui:table.cell>Sensor Name</mijnui:table.cell>
                    <mijnui:table.cell>Status</mijnui:table.cell>
                    <mijnui:table.cell>Created At</mijnui:table.cell>
                </mijnui:table.row>
            </mijnui:table.rows>
        </mijnui:table>
    </div> --}}

    <div class="col-span-3">
        <livewire:devices.log />
    </div>

</div>
