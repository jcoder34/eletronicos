<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Menu')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    
                    <flux:navlist.group
                        heading="Marcas"
                        expandable
                        :expanded="request()->routeIs('marca.*')"
                        class="mt-4">
                        
                        <flux:navlist.item
                            icon="list-bullet"
                            :href="route('marca.index')"
                            :current="request()->routeIs('marca.index')"
                            wire:navigate
                        >
                            {{ __('Listar') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            icon="plus-circle"
                            :href="route('marca.create')"
                            :current="request()->routeIs('marca.create')"
                            wire:navigate
                        >
                            {{ __('Adicionar') }}
                        </flux:navlist.item>
                    </flux:navlist.group>

                    <flux:navlist.group
                        heading="Aparelhos Elétricos"
                        expandable
                        :expanded="request()->routeIs('aparelho_eletrico.*')"
                        class="mt-4">
                        
                        <flux:navlist.item
                            icon="list-bullet"
                            :href="route('aparelho_eletrico.index')"
                            :current="request()->routeIs('aparelho_eletrico.index')"
                            wire:navigate
                        >
                            {{ __('Listar') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            icon="plus-circle"
                            :href="route('aparelho_eletrico.create')"
                            :current="request()->routeIs('aparelho_eletrico.create')"
                            wire:navigate
                        >
                            {{ __('Adicionar') }}
                        </flux:navlist.item>
                    </flux:navlist.group>

                    <flux:navlist.group
                        heading="Itens"
                        expandable
                        :expanded="request()->routeIs('item.*')"
                        class="mt-4">
                        
                        <flux:navlist.item
                            icon="list-bullet"
                            :href="route('item.index')"
                            :current="request()->routeIs('item.index')"
                            wire:navigate
                        >
                            {{ __('Listar') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            icon="plus-circle"
                            :href="route('item.create')"
                            :current="request()->routeIs('item.create')"
                            wire:navigate
                        >
                            {{ __('Adicionar') }}
                        </flux:navlist.item>
                    </flux:navlist.group>

                    <flux:navlist.group
                        heading="Clientes"
                        expandable
                        :expanded="request()->routeIs('cliente.*')"
                        class="mt-4">
                        
                        <flux:navlist.item
                            icon="list-bullet"
                            :href="route('cliente.index')"
                            :current="request()->routeIs('cliente.index')"
                            wire:navigate
                        >
                            {{ __('Listar') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            icon="plus-circle"
                            :href="route('cliente.create')"
                            :current="request()->routeIs('cliente.create')"
                            wire:navigate
                        >
                            {{ __('Adicionar') }}
                        </flux:navlist.item>
                    </flux:navlist.group>

                    <flux:navlist.group
                        heading="Funcionários"
                        expandable
                        :expanded="request()->routeIs('funcionario.*')"
                        class="mt-4">
                        
                        <flux:navlist.item
                            icon="list-bullet"
                            :href="route('funcionario.index')"
                            :current="request()->routeIs('funcionario.index')"
                            wire:navigate
                        >
                            {{ __('Listar') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            icon="plus-circle"
                            :href="route('funcionario.create')"
                            :current="request()->routeIs('funcionario.create')"
                            wire:navigate
                        >
                            {{ __('Adicionar') }}
                        </flux:navlist.item>
                    </flux:navlist.group>

                    <flux:navlist.group
                        heading="Vendas"
                        expandable
                        :expanded="request()->routeIs('venda.*')"
                        class="mt-4">
                        
                        <flux:navlist.item
                            icon="list-bullet"
                            :href="route('venda.index')"
                            :current="request()->routeIs('venda.index')"
                            wire:navigate
                        >
                            {{ __('Listar') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            icon="plus-circle"
                            :href="route('venda.create')"
                            :current="request()->routeIs('venda.create')"
                            wire:navigate
                        >
                            {{ __('Adicionar') }}
                        </flux:navlist.item>
                    </flux:navlist.group>
                    
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
