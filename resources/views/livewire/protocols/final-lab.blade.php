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
                <mijnui:input label="Comment" wire:model="description" disabled readonly/>

                <div class="flex items-center gap-4 col-span-2">
                    <mijnui:label class="w-32" >mAb Volume</mijnui:label>
                    <mijnui:input class="w-20" wire:model="mAb_volume" placeholder="Volume" />
                    <p>mL</p>
                </div>
                <div class="flex items-center gap-4 col-span-2">
                    <mijnui:label class="w-32">Payload Volume</mijnui:label>
                    <mijnui:input class="w-20" placeholder="Volume" />
                    <p>mL</p>
                </div>
                <div class="flex items-center gap-4 col-span-2">
                    <mijnui:label class="w-32">Reduction Reservior 1</mijnui:label>
                    <mijnui:input class="w-20" placeholder="Volume" />
                    <p>mL</p>
                </div>
                <div class="flex items-center gap-4 col-span-2">
                    <mijnui:label class="w-32">Reduction Reservior 2</mijnui:label>
                    <mijnui:input class="w-20" placeholder="Volume" />
                    <p>mL</p>
                </div>
                <div class="flex items-center gap-4 col-span-2">
                    <mijnui:label class="w-32">Reservior</mijnui:label>
                    <mijnui:input class="w-20" placeholder="Volume" />
                    <p>mL</p>
                </div>
                <div class="flex items-center gap-4 col-span-2">
                    <mijnui:label class="w-32">Reservior</mijnui:label>
                    <mijnui:input class="w-20" placeholder="Volume" />
                    <p>mL</p>
                </div>
                <h3 class="col-span-2 text-lg font-semibold">Desired Final Product</h3>
                <div class="flex items-center gap-4 col-span-2">
                    <mijnui:label class="w-32">Desired final Volume</mijnui:label>
                    <mijnui:input class="w-20" placeholder="Volume" />
                    <p>mL</p>
                </div>
            </div>

            <div class="col-span-2 flex items-center gap-4 my-4">
                <mijnui:checkbox />
                <span>Buffer Level Checked?</span>
            </div>
            
            <div class="col-span-2 flex items-center gap-4">
                <mijnui:button color="primary">Confirm</mijnui:button>
                <mijnui:button>Back</mijnui:button>
            </div>
        </mijnui:card.content>
    </mijnui:card>
</div>
