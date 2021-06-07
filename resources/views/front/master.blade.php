<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>College Life - @yield('title')</title>
    <!--    styles starts -->
    @include('front.include.css.css')
    @yield('extra-css')
</head>
<body>
<!-- PAGE CONTENT
============================================= -->

    @include('front.include.header.header')
<!-- INNER PAGE WRAPPER -->
    @yield('body')
{{--    footer--}}
    @include('front.include.footer.footer')
    @include('front.include.footer.smallFooter')
{{--    js--}}
    @include('front.include.js.js')
    @yield('extra-js')

{{--livewire toster notification--}}
<script>
    window.livewire.on('livewireMessage', function (message) {
        toastr.success(message);
    });
</script>
</body>
</html>
