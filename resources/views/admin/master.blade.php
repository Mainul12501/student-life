<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mainul is a Full Steak Web Developer and Digital Marketer. Mainul is providing Web-design, web-development and full SEO services. This is his portfolio site.">
    <meta name="author" content="Muhammad Ali | Mainul Islam">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}admin/assets/images/favicon.png">
    <title>@yield('title')</title>
{{--    <link rel="canonical" href="https://www.wrappixel.com/templates/niceadmin/" />--}}
    @include('admin.includes.css')

    <style>
        .hidden {
            /*display: none!important;*/
        }
    </style>
</head>

<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper">
    <livewire:admin.dashbord-parent />
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
@include('admin.includes.customize')
<!-- ============================================================== -->

@include('admin.includes.js')

@yield('extra-js')

{{--my custom scripts--}}
{{--ck editor--}}
<script>
    CKEDITOR.replace( 'editor1' );
</script>
{{--prevent browser previous page feature --}}
<script type="text/javascript">
    // type one works
    // history.pushState(null, null, 'dashboard');
    // window.addEventListener('popstate', function(event) {
    //     history.pushState(null, null, 'dashboard');
    // });

    // window.history.pushState(null, "", window.location.href);
    // window.onpopstate = function () {
    //     window.history.pushState(null, "", window.location.href);
    // };
</script>
{{--change page url with js--}}
<script>
    $(document).ready(function () {
        window.livewire.on('pageUrl', pageUrl=> {
            window.history.pushState({}, null, pageUrl);

            // window.history.pushState({}, pageUrl, pageUrl);

        })
    })
</script>

<script>
    // magnificPopup lightbox script starts
    $(document).ready(function() {
        $('.popup').magnificPopup({
            type: 'image',
            // other options
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300 // don't foget to change the duration also in CSS
            },
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
        });

    })
    // magnificPopup lightbox script ends
</script>
{{--brother sisiter field open close--}}
<script>
    // user info page custom scripts
    $('#broYes').click(function() {
        $('.bro-sis-name').removeClass('hidden');
        $('#broNameField').removeClass('hidden');
    });
    $('#sisYes').click(function() {
        $('.bro-sis-name').removeClass('hidden');
        $('#sisNameField').removeClass('hidden');
    });
    $('#broNo').click(function() {
        $('#broNameField').addClass('hidden');
    });
    $('#sisNo').click(function() {
        $('#sisNameField').addClass('hidden');
    });
</script>

<script>
    // data table configure
    $(document).ready(function() {
        $('#file_export').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
<script>
    $(".bt-switch input[type='checkbox']").bootstrapSwitch();

</script>
</body>

</html>
