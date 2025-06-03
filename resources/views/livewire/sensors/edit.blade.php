<div>
    <form wire:submit="update">

        <mijnui:card>
            <mijnui:card.header>
                <mijnui:card.title class="text-2xl font-bold text-gray-800">Sensor Create</mijnui:card.title>
            </mijnui:card.header>

            <mijnui:card.content class="grid grid-cols-2 gap-4">

                <mijnui:input wire:model="name" label="Sensor Name" placeholder="e.g. temperature checker" required />
                <mijnui:input wire:model="type" label="Sensor Type" placeholder="e.g. Heat Sensor" required />
                <mijnui:input wire:model="unit" label="Sensor Unit" placeholder="e.g. *C" required />

            </mijnui:card.content>

            <mijnui:card.footer>
                
                <mijnui:button type="submit" color="primary" size="sm" class="mt-8">Update</mijnui:button>

            </mijnui:card.footer>
            
        </mijnui:card>

    </form>

</div>
