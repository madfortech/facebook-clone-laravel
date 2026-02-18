<x-app-layout>
 
   <!-- Header -->
       @include('partials.header')
    <!-- End Header -->

   <!-- Sidebar -->
       @include('partials.sidebar')
    <!-- End Sidebar -->

    <!-- Main -->
    <flux:main container>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 border border-zinc-200 dark:border-zinc-700 lg:w-1/2 p-4 rounded-lg">
            @csrf
            @method('PUT')

            <flux:field>
                <flux:textarea name="content" value="{{ $post->content }}" />
            </flux:field>

            <flux:field>
                <flux:input type="file" name="file[]" label="File" multiple/>
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </flux:field>

            <flux:field>
               
                <flux:button variant="primary" type="submit" color="purple">
                    Update
                </flux:button>

            </flux:field>
           
        </form>
    </flux:main>
      
    <!-- End Main -->

</x-app-layout>
