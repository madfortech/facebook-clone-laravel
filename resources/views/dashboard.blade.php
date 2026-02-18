<x-app-layout>
 
   <!-- Header -->
       @include('partials.header')
    <!-- End Header -->

   <!-- Sidebar -->
       @include('partials.sidebar')
    <!-- End Sidebar -->

    <!-- Main -->
    <flux:main container>
        @include('partials.main', ['posts' => $posts])
 

    </flux:main>
      
    <!-- End Main -->

</x-app-layout>
