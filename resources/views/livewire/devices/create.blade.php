<mijnui:card>
    <mijnui:card.header>
        <mijnui:card.title class="text-2xl font-bold text-gray-800">Device Create</mijnui:card.title>
    </mijnui:card.header>
    <mijnui:card.content class="grid grid-cols-2 gap-4">
        <mijnui:input label="Device Name" placeholder="e.g. ChemLab" />
        <mijnui:input label="Model Name" placeholder="e.g. IoT3201" />
        <mijnui:input label="Device Ip/Domain" placeholder="e.g. 163.21.62.133" />
        <mijnui:input type="number" label="Device Port" placeholder="e.g. 8080" />

    </mijnui:card.content>

    <mijnui:card.footer>
        <mijnui:button color="primary" size="sm" class="mt-8">Create</mijnui:button>
    </mijnui:card.footer>
</mijnui:card>
