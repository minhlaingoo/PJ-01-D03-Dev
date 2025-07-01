<div class="min-h-screen flex items-center justify-center bg-gray-150">
    <mijnui:card class="max-w-md p-4 shadow-md">

        {{-- Header --}}
        <mijnui:card.header>
            <mijnui:card.title>
                {{ __('Login to your account') }}
            </mijnui:card.title>
            <mijnui:card.description>
                Enter your email and password below to
                <strong>{{ setting('general')->appName }}</strong>
            </mijnui:card.description>
        </mijnui:card.header>

        {{-- Error Alert --}}
        @if (session()->has('error'))
            <mijnui:alert color="error" class="mb-4">
                <mijnui:alert.description class="pl-0">
                    {{ session('error') }}
                </mijnui:alert.description>
            </mijnui:alert>
        @endif

        {{-- Login Form --}}
        <mijnui:card.content>
            <form wire:submit.prevent="login" class="space-y-4">

                {{-- Email --}}
                <div>
                    <mijnui:input type="email" id="email" label="Email" wire:model="email" autofocus />
                </div>

                {{-- Password --}}
                <div>
                    <mijnui:input type="password" id="password" label="Password" wire:model="password" viewable />
                </div>

                {{-- Terms & Modal --}}
                <div class="flex items-center text-xs text-gray-500">
                    <mijnui:checkbox wire:model.live="agree" />
                    <span class="ml-2 flex-1">
                        By checking this, you agree to our
                        <mijnui:modal>
                            <mijnui:modal.content class="max-w-sm">
                                <mijnui:modal.header title="Rules & Policy">
                                    <h1 class="font-medium text-black text-lg">Rules & Policy</h1>
                                </mijnui:modal.header>
                                <hr>
                                <mijnui:modal.body>
                                    This system is the property of
                                    <b>{{ setting('general')->appName }}</b>. Unauthorized access is prohibited and
                                    may lead to legal action. Activities are monitored. By logging in, you agree to
                                    follow all company policies.
                                </mijnui:modal.body>
                            </mijnui:modal.content>

                            <mijnui:modal.trigger class="inline">
                                <span class="text-info cursor-pointer font-bold">rules & policy</span>
                            </mijnui:modal.trigger>
                        </mijnui:modal>
                    </span>
                </div>

                {{-- Submit Button --}}
                <mijnui:button type="submit" color="primary" class="w-full" :disabled="!$agree" has-loading>
                    Login
                </mijnui:button>

                {{-- Forgot Password --}}
                <p class="text-info font-medium text-xs ml-auto w-fit">
                    Forgot Password
                </p>
            </form>

            {{-- Test Credentials --}}
            <div class="text-center text-xs border p-4 rounded-md mt-4">
                <p class="font-semibold">For testing purpose</p>
                <p>email: testing@example.com</p>
                <p>password: testing1234</p>
            </div>
        </mijnui:card.content>
    </mijnui:card>
</div>
