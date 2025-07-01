<div class="space-y-4">
    <x-alert />
    <form wire:submit="update">
        <mijnui:card>
            <mijnui:card.header>
                <mijnui:card.title class="text-2xl font-semibold">{{ $device->name }}'s Device Setting
                </mijnui:card.title>
            </mijnui:card.header>
            <mijnui:card.content>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <mijnui:label>Device Stauts</mijnui:label>
                        <mijnui:toggle wire:model="is_active" />
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <mijnui:input wire:model="name" label="Device Name" placeholder="e.g. ChemLab" required />
                        <mijnui:input wire:model="model" label="Model Name" placeholder="e.g. IoT3201" required />
                        <mijnui:input wire:model="ip" label="Device Ip/Domain" placeholder="e.g. 163.21.62.133"
                            required />
                        <mijnui:input wire:model="port" type="number" label="Device Port" placeholder="e.g. 8080"
                            required />
                        <mijnui:input wire:model="topic" type="text" label="Device's Publishing Topic"
                            placeholder="e.g. test/topic" />
                    </div>

                    <mijnui:button type="submit" color="primary" wire:target="update" has-loading>Update</mijnui:button>
                </div>
            </mijnui:card.content>

        </mijnui:card>
    </form>

    @if ($device->is_active)
        <mijnui:card>
            <mijnui:card.header>
                <mijnui:card.title class="text-2xl font-semibold">{{ $device->name }}'s Publish Message
                    Setting
                </mijnui:card.title>
            </mijnui:card.header>
            <mijnui:card.content>
                <div class="space-y-4">
                    <mijnui:input class="max-w-64" label="Message" wire:model="publish_message" />
                    <mijnui:button wire:click="publish" color="primary" wire:target="publish" has-loading>Publish</mijnui:button>
                </div>
            </mijnui:card.content>
        </mijnui:card>
    @endif
    {{-- <script>
        let mode = 'plain';

        function switchMode(newMode) {
            mode = newMode;
            document.getElementById('plainTab').className =
                newMode === 'plain' ? activeTabClass() : inactiveTabClass();
            document.getElementById('jsonTab').className =
                newMode === 'json' ? activeTabClass() : inactiveTabClass();
            document.getElementById('sharedInput').value = '';
            document.getElementById('errorMsg').classList.add('hidden');
        }

        function activeTabClass() {
            return "tab-btn text-white bg-blue-500 px-4 py-2 rounded";
        }

        function inactiveTabClass() {
            return "tab-btn text-gray-600 bg-gray-200 px-4 py-2 rounded";
        }

        function saveData() {
            const input = document.getElementById('sharedInput').value;
            const errorMsg = document.getElementById('errorMsg');

            if (mode === 'json') {
                try {
                    const parsed = JSON.parse(input);
                    localStorage.setItem('jsonData', JSON.stringify(parsed));
                    errorMsg.classList.add('hidden');
                    alert('JSON saved!');
                } catch (e) {
                    errorMsg.textContent = 'Invalid JSON format!';
                    errorMsg.classList.remove('hidden');
                }
            } else {
                localStorage.setItem('plainText', input);
                errorMsg.classList.add('hidden');
                alert('Plain text saved!');
            }
        }

        function loadData() {
            const input = document.getElementById('sharedInput');
            const errorMsg = document.getElementById('errorMsg');
            if (mode === 'json') {
                try {
                    const data = localStorage.getItem('jsonData') || '{}';
                    input.value = JSON.stringify(JSON.parse(data), null, 2);
                    errorMsg.classList.add('hidden');
                } catch (e) {
                    errorMsg.textContent = 'Error loading JSON!';
                    errorMsg.classList.remove('hidden');
                }
            } else {
                input.value = localStorage.getItem('plainText') || '';
                errorMsg.classList.add('hidden');
            }
        }

        function handleInput() {
            const input = document.getElementById('sharedInput');
            const errorMsg = document.getElementById('errorMsg');
            if (mode !== 'json') return;

            const value = input.value;
            try {
                const parsed = JSON.parse(value);

                // Save current caret position
                const start = input.selectionStart;
                const beforeCaret = value.slice(0, start);

                // Format the JSON
                const formatted = JSON.stringify(parsed, null, 2);
                input.value = formatted;

                // Try to restore caret to approximately the same place
                const newPos = formatted.length < beforeCaret.length ? formatted.length : beforeCaret.length;
                input.selectionStart = input.selectionEnd = newPos;

                errorMsg.classList.add('hidden');
            } catch (e) {
                // No formatting or error shown during typing
            }
        }

        function handleKey(e) {
            if (mode !== 'json') return;

            const textarea = e.target;
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const text = textarea.value;

            // Store the current cursor position
            const cursorPosition = textarea.selectionStart;

            // Auto-close for brackets and quotes
            const pairs = {
                '{': '}',
                '[': ']',
                '(': ')'
            };

            // Handle quotes specially
            if (e.key === '"') {
                const charBefore = text[start - 1];
                const charAfter = text[start];

                // Count how many quotes exist before cursor to determine if inside a string
                const quoteCount = text.slice(0, start).split('"').length - 1;
                const isInString = quoteCount % 2 === 1;

                if (charAfter === '"') {
                    // Skip over the closing quote
                    e.preventDefault();
                    textarea.selectionStart = textarea.selectionEnd = start + 1;
                } else if (!isInString) {
                    // Not inside a string, insert pair only if it makes sense
                    e.preventDefault();
                    textarea.setRangeText('""', start, end, 'end');
                    textarea.selectionStart = textarea.selectionEnd = start + 1;
                } else {
                    // Inside a string, let user continue typing without messing up cursor
                    e.preventDefault();
                    return;
                }
                return;
            }

            // Smart Enter inside {}
            if (e.key === 'Enter') {
                if (start > 0 && text[start - 1] === '{' && text[start] === '}') {
                    e.preventDefault();
                    const indent = '  ';
                    textarea.value = text.slice(0, start) + '\n' + indent + '\n' + text.slice(start);
                    textarea.selectionStart = textarea.selectionEnd = start + indent.length + 1;
                }
            }

            // Auto-close brackets
            if (pairs[e.key]) {
                const closeChar = pairs[e.key];
                e.preventDefault();
                textarea.setRangeText(e.key + closeChar, start, end, 'end');
                textarea.selectionStart = textarea.selectionEnd = start + 1;
            }

            // Format JSON (if formatting is triggered somehow)
            if (e.key === 'Enter') {
                try {
                    const formatted = JSON.stringify(JSON.parse(text), null, 2);
                    if (formatted !== text) {
                        // Update the textarea value with formatted text, preserving cursor position
                        const before = text.slice(0, cursorPosition);
                        const after = text.slice(cursorPosition);
                        textarea.value = formatted;
                        textarea.selectionStart = before.length;
                        textarea.selectionEnd = before.length;
                    }
                } catch (err) {
                    // Handle invalid JSON gracefully
                    console.error('Invalid JSON, unable to format.');
                }
            }
        }
    </script> --}}
</div>
