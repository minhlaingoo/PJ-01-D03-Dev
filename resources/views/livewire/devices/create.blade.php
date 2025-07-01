<form wire:submit="store">

    <mijnui:card>
        <mijnui:card.header>
            <mijnui:card.title class="text-2xl font-bold text-gray-800">Device Create</mijnui:card.title>
        </mijnui:card.header>

        <mijnui:card.content class="grid grid-cols-2 gap-4">

            <mijnui:input wire:model="name" label="Device Name" placeholder="e.g. ChemLab" required />
            <mijnui:input wire:model="model" label="Model Name" placeholder="e.g. IoT3201" required />
            <mijnui:input wire:model="ip" label="Device Ip/Domain" placeholder="e.g. 163.21.62.133" required />
            <mijnui:input wire:model="port" type="number" label="Device Port" placeholder="e.g. 8080" required />
            <mijnui:input wire:model="topic" type="text" label="Device's Subscribed Topic"
                placeholder="e.g. test/topic" />

        </mijnui:card.content>

        <mijnui:card.footer>
            <mijnui:button type="submit" color="primary" has-loading>
                Create
            </mijnui:button>

        </mijnui:card.footer>
    </mijnui:card>

</form>
