<!DOCTYPE html>
<html lang="en">

@include('comet/layouts.partials.head')

  <body>

    @include('comet/layouts.partials.preloader')
    @include('comet/layouts.partials.header')
    @include('comet/layouts.partials.parallax')


    
    @section('main')
        
    @show



    @include('comet/layouts.partials.footer')
    @include('comet/layouts.partials.scripts')
    
  </body>
</html>