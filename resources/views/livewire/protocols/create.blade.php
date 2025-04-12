<div class="space-y-2">


    <mijnui:card>
        <mijnui:card.header>
            <mijnui:card.title class="text-lg font-semibold">
                Creating Protocol
            </mijnui:card.title>
        </mijnui:card.header>
        <mijnui:card.content>
            <div>
                <mijnui:input label="Sample ID" />
                <div class="w-full space-y-1">
                    <p class="text-sm">Description</p>
                    <!-- TextArea -->
                    <textarea
                        class="border-input disabled:opacity-disabled flex min-h-[80px] w-full rounded-md border bg-transparent px-3 py-2 text-sm placeholder:text-muted-text focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed"
                        placeholder="Description about protocol"></textarea>
                </div>

            </div>

        </mijnui:card.content>

    </mijnui:card>

    <mijnui:card>
        <mijnui:card.header>
            <mijnui:card.title class="text-lg font-semibold">
                mAb
            </mijnui:card.title>
        </mijnui:card.header>
        <mijnui:card.content class="grid grid-cols-2 gap-4">
            <div class="w-full">
                <mijnui:label>Volume</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input value="0" />
                    </div>
                    <mijnui:select value="ml">
                        <mijnui:select.option value="ml">ml</mijnui:select.option>
                        <mijnui:select.option value="L">L</mijnui:select.option>
                    </mijnui:select>
                </div>
            </div>
            <div class="w-full">
                <mijnui:label>Concentration</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input />
                    </div>
                    <mijnui:select value="ml">
                        <mijnui:select.option value="ml">ml</mijnui:select.option>
                        <mijnui:select.option value="L">L</mijnui:select.option>
                    </mijnui:select>
                </div>
            </div>

            <mijnui:input label="Molecular Weight" />
            <mijnui:input label="Molar Absorping Coefficient" />

            <div class="w-full">
                <mijnui:label>Volume to Add</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input type="number" value="0" placeholder="Volume"  />
                    </div>
                    <mijnui:select value="ml">
                        <mijnui:select.option value="ml">ml</mijnui:select.option>
                        <mijnui:select.option value="L">L</mijnui:select.option>
                    </mijnui:select>
                </div>
            </div>

        </mijnui:card.content>
    </mijnui:card>

    <mijnui:card>
        <mijnui:card.header>
            <mijnui:card.title class="text-lg font-semibold">
                Payload
            </mijnui:card.title>
        </mijnui:card.header>
        <mijnui:card.content class="grid grid-cols-2 gap-4">
            <div class="w-full">
                <mijnui:label>Volume Available</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input />
                    </div>
                    <mijnui:select value="ml">
                        <mijnui:select.option value="ml">ml</mijnui:select.option>
                        <mijnui:select.option value="L">L</mijnui:select.option>
                    </mijnui:select>
                </div>
            </div>
            <div class="w-full">
                <mijnui:label>Concentration</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input />
                    </div>
                    <mijnui:select value="ml">
                        <mijnui:select.option value="ml">ml</mijnui:select.option>
                        <mijnui:select.option value="L">L</mijnui:select.option>
                    </mijnui:select>
                </div>
            </div>

            <mijnui:input label="Molecular Weight" />
            <mijnui:input label="Molar Equivalence" />

            <div class="w-full">
                <mijnui:label>Volume to Add</mijnui:label>
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <mijnui:input type="number" value="0" placeholder="Volume"  />
                    </div>
                    <mijnui:select value="ml">
                        <mijnui:select.option value="ml">ml</mijnui:select.option>
                        <mijnui:select.option value="L">L</mijnui:select.option>
                    </mijnui:select>
                </div>
            </div>

            <mijnui:input label="Molar Absorping Coefficient" />

        </mijnui:card.content>
    </mijnui:card>

    <mijnui:card x-data="{ open: true }">
        <mijnui:card.header>
            <mijnui:card.title class="text-lg font-semibold">
                Miscellaneous
            </mijnui:card.title>
        </mijnui:card.header>

        <mijnui:card.content>
            <div class="flex items-center gap-4">
                <mijnui:label>Use Reducing Conditions</mijnui:label>
                <mijnui:toggle checked x-on:change="open = !open" />
            </div>

            <template x-if="open">
                <div class="grid grid-cols-2 gap-4">

                    <div class="w-full">
                        <mijnui:label>Reduction Reservior</mijnui:label>

                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <mijnui:input type="number" value="0" placeholder="Volume"  />
                            </div>
                            <mijnui:select value="ml">
                                <mijnui:select.option value="ml">ml</mijnui:select.option>
                                <mijnui:select.option value="L">L</mijnui:select.option>
                            </mijnui:select>
                        </div>
                    </div>
                    <div class="w-full">
                        <mijnui:label>Additive Reservior A</mijnui:label>

                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <mijnui:input type="number" value="0" placeholder="Volume"  />
                            </div>
                            <mijnui:select value="ml">
                                <mijnui:select.option value="ml">ml</mijnui:select.option>
                                <mijnui:select.option value="L">L</mijnui:select.option>
                            </mijnui:select>
                        </div>

                    </div>
                    <div class="w-full">
                        <mijnui:label>Additive Reservior B</mijnui:label>

                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <mijnui:input type="number" value="0" placeholder="Volume"  />
                            </div>
                            <mijnui:select value="ml">
                                <mijnui:select.option value="ml">ml</mijnui:select.option>
                                <mijnui:select.option value="L">L</mijnui:select.option>
                            </mijnui:select>
                        </div>

                    </div>
                    <div class="w-full">
                        <mijnui:label>Additive Reservior C</mijnui:label>

                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <mijnui:input type="number" value="0" placeholder="Volume"  />
                            </div>
                            <mijnui:select value="ml">
                                <mijnui:select.option value="ml">ml</mijnui:select.option>
                                <mijnui:select.option value="L">L</mijnui:select.option>
                            </mijnui:select>
                        </div>

                    </div>
                </div>

            </template>

        </mijnui:card.content>
    </mijnui:card>

    <mijnui:card>
        <mijnui:card.header>Desired Final Product</mijnui:card.header>
        <mijnui:card.content class="grid grid-cols-2 gap-4">
            <mijnui:input label="Desired Final Concentration" placeholder="Concentration" />
        </mijnui:card.content>


        <mijnui:card.footer>
            <mijnui:button color="primary">Confirm</mijnui:button>
        </mijnui:card.footer>

    </mijnui:card>


</div>
