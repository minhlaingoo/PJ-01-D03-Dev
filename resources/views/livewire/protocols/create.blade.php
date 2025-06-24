<div class="space-y-2">
    <x-alert />
    <mijnui:card>
        <mijnui:card.header>
            <mijnui:card.title class="text-lg font-semibold">
                Thiol-Maleimide Conjugation Protocol
            </mijnui:card.title>
        </mijnui:card.header>
        <mijnui:card.content>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <mijnui:input label="Sample ID" wire:model="sample_id" />
                <div class="w-full space-y-1">
                    <p class="text-sm">Description</p>

                    <textarea
                        class="border-input disabled:opacity-disabled flex min-h-[80px] w-full rounded-md border bg-transparent px-3 py-2 text-sm placeholder:text-muted-text focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed"
                        placeholder="Description about protocol" wire:model="description"></textarea>
                </div>
            </div>
        </mijnui:card.content>
    </mijnui:card>

    <!-- mAb Card -->
    <mijnui:card>
        <mijnui:card.header>
            <mijnui:card.title class="text-lg font-semibold">mAb</mijnui:card.title>
        </mijnui:card.header>
        <mijnui:card.content class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="w-full">
                <mijnui:label>Mass</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input wire:model="formData.mAb.volume" />
                    </div>
                    <select wire:model="formData.mAb.volume_unit" class="border rounded px-2 py-1">
                        <option value="µL">µL</option>
                        <option value="mL">mL</option>
                    </select>
                </div>
            </div>

            <div class="w-full">
                <mijnui:label>Concentration</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input wire:model="formData.mAb.concentration" />
                    </div>
                    <select wire:model="formData.mAb.concentration_unit" class="border rounded px-2 py-1">
                        <option value="mg/mL">mg/mL</option>
                        <option value="µg/mL">µg/mL</option>
                        <option value="nM">nM</option>
                    </select>
                </div>
            </div>

            <mijnui:input label="Molecular Weight" wire:model="formData.mAb.molecular_weight" />
            <mijnui:input label="Molar Absorbing Coefficient" wire:model="formData.mAb.molar_absorbing_coefficient" />

            <!-- <div class="w-full">
                <mijnui:label>Volume to Add</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input type="number" wire:model="formData.mAb.volume_to_add" />
                    </div>
                    <select wire:model="formData.mAb.volume_to_add_unit" class="border rounded px-2 py-1">
                        <option value="µL">µL</option>
                        <option value="mL">mL</option>
                    </select>
                </div>
            </div> -->
        </mijnui:card.content>
    </mijnui:card>

    <!-- Payload Card -->
    <mijnui:card>
        <mijnui:card.header>
            <mijnui:card.title class="text-lg font-semibold">Payload</mijnui:card.title>
        </mijnui:card.header>
        <mijnui:card.content class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="w-full">
                <mijnui:label>Volume Available</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input wire:model="formData.payload.volume_available" />
                    </div>
                    <select wire:model="formData.payload.volume_available_unit" class="border rounded px-2 py-1">
                        <option value="µL">µL</option>
                        <option value="mL">mL</option>
                    </select>
                </div>
            </div>

            <div class="w-full">
                <mijnui:label>Concentration</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input wire:model="formData.payload.concentration" />
                    </div>
                    <select wire:model="formData.payload.concentration_unit" class="border rounded px-2 py-1">
                        <option value="mg/mL">mg/mL</option>
                        <option value="µg/mL">µg/mL</option>
                        <option value="nM">nM</option>
                    </select>
                </div>
            </div>

            <mijnui:input label="Molecular Weight" wire:model="formData.payload.molecular_weight" />
            <mijnui:input label="Molar Equivalence" wire:model="formData.payload.molar_equivalence" />

            <!-- <div class="w-full">
                <mijnui:label>Volume to Add</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input wire:model="formData.payload.volume_to_add" />
                    </div>
                    <select wire:model="formData.payload.volume_to_add_unit" class="border rounded px-2 py-1">
                        <option value="µL">µL</option>
                        <option value="mL">mL</option>
                    </select>
                </div>
            </div> -->

            <mijnui:input label="Molar Absorbing Coefficient"
                wire:model="formData.payload.molar_absorbing_coefficient" />
        </mijnui:card.content>
    </mijnui:card>

    <!-- Miscellaneous Card -->
    <!-- <mijnui:card x-data="{ open: true }">
        <mijnui:card.header>
            <mijnui:card.title class="text-lg font-semibold">Miscellaneous</mijnui:card.title>
        </mijnui:card.header>

        <mijnui:card.content>
            <div class="flex items-center gap-4">
                <mijnui:label>Use Reducing Conditions</mijnui:label>
                <mijnui:toggle wire:model="formData.misc.use_reducing_conditions" x-on:change="open = !open" />
            </div>

            <template x-if="open">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach (['reduction_reservoir', 'additive_reservoir_a', 'additive_reservoir_b', 'additive_reservoir_c'] as $res)
                        <div class="w-full">
                            <mijnui:label>{{ ucwords(str_replace('_', ' ', $res)) }}</mijnui:label>
                            <div class="flex items-center gap-4">
                                <div class="flex-1">
                                    <mijnui:input type="number" wire:model="formData.misc.{{ $res }}" />
                                </div>
                                <select wire:model="formData.misc.{{ $res . '_unit' }}"
                                    class="border rounded px-2 py-1">
                                    <option value="µL">µL</option>
                                    <option value="mL">mL</option>
                                </select>
                            </div>
                        </div>
                    @endforeach
                </div>
            </template>
        </mijnui:card.content>
    </mijnui:card> -->


    <mijnui:card>
        <mijnui:card.header>Desired Final Product</mijnui:card.header>
        <mijnui:card.content class="grid grid-cols-2 gap-4">
            <mijnui:input label="Desired Final Concentration" placeholder="Concentration" />
        </mijnui:card.content>


        <mijnui:card.footer>
            <mijnui:button wire:click="finalizeProtocol" color="primary">Next</mijnui:button>
        </mijnui:card.footer>

    </mijnui:card>


</div>
