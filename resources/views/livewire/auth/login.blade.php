<div class="min-h-screen flex items-center justify-center bg-gray-150">

    <mijnui:card class="max-w-md p-8 shadow-md">
        <mijnui:card.header>
            <mijnui:card.title>
                {{ __('Login to your account') }}
            </mijnui:card.title>
            <mijnui:card.description>Enter your email and password below to <strong>{{setting('general')->appName}}</strong>
            </mijnui:card.description>
        </mijnui:card.header>
        @if (session()->has('error'))
            <mijnui:alert color="error" class="mb-4">
                <mijnui:alert.description class="pl-0">{{ session('error') }}</mijnui:alert.description>
            </mijnui:alert>
        @endif
        <mijnui:card.content>
            <form wire:submit.prevent="login" class="space-y-4">

                <div>
                    <mijnui:input type="email" id="email" label="Email" wire:model="email" autofocus />
                </div>

                <div>
                    <mijnui:input type="password" id="password" label="Password" wire:model="password" />
                </div>

                <div class="flex items-center justify-between">
                    <mijnui:checkbox class="text-xs" label="Remember Me" wire:model="remember"></mijnui:checkbox>
                    <p class="text-info font-medium text-xs">Forget Password</p>
                </div>

                <div class="flex items-center">
                    <mijnui:toggle wire:model.live="agree" />
                    <span class="text-xs text-gray-500 ml-2 flex-1">By checking this, you are to agree
                        <mijnui:modal>
                            <mijnui:modal.content class="max-w-sm">
                                <mijnui:modal.header title="Rules & Policy">
                                    <h1 class="font-medium text-black text-lg">Rules & Policy</h1>
                                </mijnui:modal.header>
                                <hr>
                                <mijnui:modal.body>
                                    This system is the property of
                                    <b>{{ setting('general')->appName }}</b> company. Unauthorized
                                    access or use is strictly
                                    prohibited and may result in legal action. Activities are monitored and recorded. By
                                    logging in, you
                                    acknowledge and agree to comply with company policies and security guidelines.
                                </mijnui:modal.body>
                            </mijnui:modal.content>
                            <mijnui:modal.trigger class="inline">
                                <span class="text-info cursor-pointer font-bold">rules & poilcy</span>
                            </mijnui:modal.trigger>

                        </mijnui:modal>
                    </span>
                </div>

                <mijnui:button :disabled="!$agree" type="submit" color="primary" class="w-full">Login</mijnui:button>
            </form>
        </mijnui:card.content>
    </mijnui:card>
</div>
