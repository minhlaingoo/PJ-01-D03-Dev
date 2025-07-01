<div>
    <mijnui:card class="max-w-2xl">
        <mijnui:card.header>
            <mijnui:card.title class="text-lg font-semibold">
                Reaction Overview
            </mijnui:card.title>
        </mijnui:card.header>

        <mijnui:card.content>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <mijnui:input label="Sample ID" wire:model="sample_id" disabled readonly />
                <mijnui:input label="Comment" wire:model="description" disabled readonly />
            </div>

            <div class="mt-6 space-y-4">
                <div class="grid grid-cols-6 gap-4 items-center">
                    <mijnui:label>mAb Volume</mijnui:label>
                    <div class="col-span-4">
                        <mijnui:input wire:model="mAb_volume" placeholder="Volume" />
                    </div>
                    <mijnui:input value="mL" disabled />
                </div>

                <div class="grid grid-cols-6 gap-4 items-center">
                    <mijnui:label>Payload Volume</mijnui:label>
                    <div class="col-span-4">
                        <mijnui:input placeholder="Volume" />
                    </div>
                    <mijnui:input value="mL" disabled />
                </div>

                <div class="grid grid-cols-6 gap-4 items-center">
                    <mijnui:label>Reduction Reservoir 1</mijnui:label>
                    <div class="col-span-4">
                        <mijnui:input placeholder="Volume" />
                    </div>
                    <mijnui:input value="mL" disabled />
                </div>

                <div class="grid grid-cols-6 gap-4 items-center">
                    <mijnui:label>Reduction Reservoir 2</mijnui:label>
                    <div class="col-span-4">
                        <mijnui:input placeholder="Volume" />
                    </div>
                    <mijnui:input value="mL" disabled />
                </div>

                <div class="grid grid-cols-6 gap-4 items-center">
                    <mijnui:label>Reservoir</mijnui:label>
                    <div class="col-span-4">
                        <mijnui:input placeholder="Volume" />
                    </div>
                    <mijnui:input value="mL" disabled />
                </div>

                <div class="grid grid-cols-6 gap-4 items-center">
                    <mijnui:label>Reservoir</mijnui:label>
                    <div class="col-span-4">
                        <mijnui:input placeholder="Volume" />
                    </div>
                    <mijnui:input value="mL" disabled />
                </div>

                <h3 class="text-lg font-semibold pt-2">Desired Final Product</h3>

                <div class="grid grid-cols-6 gap-4 items-center">
                    <mijnui:label>Desired Final Volume</mijnui:label>
                    <div class="col-span-4">
                        <mijnui:input placeholder="Volume" />
                    </div>
                    <mijnui:input value="mL" disabled />
                </div>
            </div>

            <div class="flex items-center gap-4 my-6">
                <mijnui:checkbox />
                <span>Buffer Level Checked?</span>
            </div>

            <div class="flex items-center gap-4">
                <mijnui:button color="primary">Confirm</mijnui:button>
                <mijnui:button>Back</mijnui:button>
            </div>
        </mijnui:card.content>
    </mijnui:card>
</div>
