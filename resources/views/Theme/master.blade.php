<!DOCTYPE html>
<html lang="en">
    @include("Theme.partials.head")

<body>
  <!--================Header Menu Area =================-->
  @include("Theme.partials.header")

  <!--================Header Menu Area =================-->
  
  
  @yield('content')


  @include("Theme.partials.footer")
  <!--================ Start Footer Area =================-->
 
  <!--================ End Footer Area =================-->
  @include("Theme.partials.scripts")
 
</body>
</html>