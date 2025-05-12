<div class="space-y-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:grid-cols-4">
        <mijnui:card class="max-w-80">
            <mijnui:card.header>
                <span
                    class="disabled:text-muted/75-text inline-flex h-10 w-10 items-center justify-center gap-1 rounded-full bg-accent p-0 text-sm hover:bg-muted hover:text-accent-text disabled:bg-muted/75 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-users"></i>
                </span>
            </mijnui:card.header>
            <mijnui:card.content>
                <p class="text-sm font-medium text-muted-text">Total Users</p>
                <h3 class="text-xl font-medium sm:text-2xl">{{ $totalUser ?? 0 }}</h3>
                <p class="text-xs font-normal text-muted-text">
                    <span class="text-success">+1</span>
                    from this month
                </p>
            </mijnui:card.content>
        </mijnui:card>
        <mijnui:card class="max-w-80">
            <mijnui:card.header>
                <span
                    class="disabled:text-muted/75-text inline-flex h-10 w-10 items-center justify-center gap-1 rounded-full bg-accent p-0 text-sm hover:bg-muted hover:text-accent-text disabled:bg-muted/75 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-layer-group"></i>
                </span>
            </mijnui:card.header>
            <mijnui:card.content>
                <p class="text-sm font-medium text-muted-text">Total Role</p>
                <h3 class="text-xl font-medium sm:text-2xl">{{ $totalRole ?? 0 }}</h3>
                <p class="text-xs font-normal text-muted-text">
                    <span class="text-success">+1</span>
                    from this month
                </p>
            </mijnui:card.content>
        </mijnui:card>
        <mijnui:card class="max-w-80">
            <mijnui:card.header>
                <span
                    class="disabled:text-muted/75-text inline-flex h-10 w-10 items-center justify-center gap-1 rounded-full bg-accent p-0 text-sm hover:bg-muted hover:text-accent-text disabled:bg-muted/75 sm:h-12 sm:w-12">
                    <i class="fa-regular fa-hard-drive"></i>
                </span>
            </mijnui:card.header>
            <mijnui:card.content>
                <p class="text-sm font-medium text-muted-text">Total Devices</p>
                <h3 class="text-xl font-medium sm:text-2xl">0</h3>
            </mijnui:card.content>
        </mijnui:card>
        <mijnui:card class="max-w-80">
            <mijnui:card.header>
                <span
                    class="disabled:text-muted/75-text inline-flex h-10 w-10 items-center justify-center gap-1 rounded-full bg-accent p-0 text-sm hover:bg-muted hover:text-accent-text disabled:bg-muted/75 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-code-pull-request"></i>
                </span>
            </mijnui:card.header>
            <mijnui:card.content>
                <p class="text-sm font-medium text-muted-text">Total Protocol</p>
                <h3 class="text-xl font-medium sm:text-2xl">0</h3>
            </mijnui:card.content>
        </mijnui:card>
    </div>

    <mijnui:card class="pt-4">
        <mijnui:card.content class="flex gap-4 items-center">
            <p class="font-medium">Current Device</p>
            <mijnui:select value="device1" class="w-64">
                <mijnui:select.option value="device1">Device 1</mijnui:select.option>
                <mijnui:select.option value="device2">Device 2</mijnui:select.option>
            </mijnui:select>
        </mijnui:card.content>
    </mijnui:card>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <mijnui:card>
            <mijnui:card.header class="text-lg font-semibold">Chamber Volume List</mijnui:card.header>
            <mijnui:card.content>
                <livewire:charts.chamber-bar-chart />
            </mijnui:card.content>
        </mijnui:card>

        <mijnui:card>
            <mijnui:card.header>
                <mijnui:card.title class="text-lg font-semibold">
                    Daily Protocol Monitoring
                </mijnui:card.title>
            </mijnui:card.header>
            <mijnui:card.content>
                <livewire:charts.daily-protocol-line-chart />
            </mijnui:card.content>
        </mijnui:card>

        <mijnui:card>
            <mijnui:card.header>
                <mijnui:card.title class="text-lg font-semibold flex items-center justify-between">
                    <p>Daily Volume Usage</p>
                    <mijnui:select value="Chamber1" class="w-64">
                        <mijnui:select.option value="Chamber1">Chamber 1</mijnui:select.option>
                        <mijnui:select.option value="Chamber2">Chamber 2</mijnui:select.option>
                    </mijnui:select>
                </mijnui:card.title>
            </mijnui:card.header>
            <mijnui:card.content>
                <livewire:charts.daily-chamber-volume-usage-chart />
            </mijnui:card.content>
        </mijnui:card>

        <mijnui:card class="h-96">
            <mijnui:card.header class="text-lg font-semibold">
                <mijnui:card.title class="text-lg font-semibold">
                    Sample Pie Chart
                </mijnui:card.title>
            </mijnui:card.header>
            <mijnui:card.content>
                <livewire:charts.sample-pie-chart />
            </mijnui:card.content>
        </mijnui:card>
    </div>

    <div>
        <livewire:sensors.log />
    </div>

</div>
