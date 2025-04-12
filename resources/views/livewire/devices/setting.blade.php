<mijnui:card>
    <mijnui:card.header>
        <mijnui:card.title class="text-2xl font-semibold">ChemLab's Device Setting</mijnui:card.title>
    </mijnui:card.header>
    <mijnui:card.content>
        <form>
            <div class="flex items-center gap-4 my-2">
                <mijnui:label >Device Stauts</mijnui:label>
                <mijnui:toggle checked/>
            </div>
            <div class="flex gap-4">
                <div class="w-1/2">
                    <mijnui:input label="Device Name" placeholder="Device Name" required/>
                </div>
            </div>
        </form>
    </mijnui:card.content>

</mijnui:card>
