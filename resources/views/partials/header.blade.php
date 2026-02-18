    <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:brand href="{{ route('dashboard') }}" name="Facebook" class="max-lg:hidden dark:hidden" />
 
        <flux:navbar class="-mb-px max-lg:hidden flex items-center">
            <flux:navbar.item icon="home" href="{{ route('dashboard') }}" current>Home</flux:navbar.item>
            <flux:navbar.item icon="plus" href="{{ route('posts.create') }}">Add</flux:navbar.item>
            <flux:navbar.item icon="users" href="#">Friends</flux:navbar.item>
             

            <flux:separator vertical variant="subtle" class="my-2"/>

            
        </flux:navbar>

        <flux:spacer />

        <flux:navbar class="me-4">
            <flux:navbar.item class="max-lg:hidden" icon="bell" href="#" />
         </flux:navbar>

        <flux:dropdown position="top" align="start">
            <flux:profile name="{{ Auth::user()->name }}" />

            <flux:menu>
                <flux:menu.separator />
                <flux:navbar.item icon="cog-6-tooth" href="#">Settings</flux:navbar.item>
                
                <flux:menu.item>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <flux:navbar.item icon="arrow-left-end-on-rectangle" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </flux:navbar.item>
 
                    </form>
                </flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:header>