<x-guest-layout>

    <div class="static lg:grid lg:grid-flow-col lg:grid-rows-3 lg:gap-4 py-12 px-16 h-screen bg-gray-100">
        <!-- Static parent -->
        
        <div class="inline-block lg:row-span-3">
            <flux:header container class="pl-8 pr-8 py-8 bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
                <flux:heading size="xl">
                    lorium ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                </flux:heading>

            </flux:header>
        </div>
        <!-- Static parent -->
        
        <div class="lg:col-span-2 lg:row-span-2 bg-gray-200 mt-4 lg:mt-8 flex items-center justify-center text-center min-h-[300px]">
            <flux:link class="text-2xl" href="{{ route('login') }}">
                {{ __('Login') }}
            </flux:link>
        </div>
    </div>
    
</x-guest-layout>
