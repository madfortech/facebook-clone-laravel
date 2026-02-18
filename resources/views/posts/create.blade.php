<x-app-layout>
 
   <!-- Header -->
       @include('partials.header')
    <!-- End Header -->

   <!-- Sidebar -->
       @include('partials.sidebar')
    <!-- End Sidebar -->

    <!-- Main -->
    <flux:main container>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 border border-zinc-200 dark:border-zinc-700 lg:w-1/2 p-4 rounded-lg">
            @csrf

            <flux:field>
                <flux:textarea name="content" placeholder="What's on your mind?" />
            </flux:field>

            <flux:field>
                <flux:input type="file" name="file[]" label="File" multiple/>
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </flux:field>

            <flux:field>
               
                <flux:button variant="primary" type="submit" color="purple">Publish</flux:button>

            </flux:field>
           
        </form>
    </flux:main>
      
    <!-- End Main -->

</x-app-layout>
