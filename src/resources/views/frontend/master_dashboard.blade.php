<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Easy Online Shop Store</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
</head>

<body>
    <!-- Modal -->
    @include('frontend.body.quickview')
    <!-- Quick view -->

    <!-- Header  -->

    @include('frontend.body.header')
    <!-- End Header  -->










    <main class="main">
        @yield('main')

    </main>





    @include('frontend.body.footer')


    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>




    <script type="text/javascript">
        // function addToWishList(product_id) {
        //     $.ajax({
        //         method: 'POST',
        //         dataType: 'json',
        //         url: "/add-to-wishlist/" + product_id,

        //         success: function(data) {
        //             const Toast = Swal.mixin({
        //                 toast: true,
        //                 position: 'top-end',
        //                 icon: 'success',
        //                 showConfirmButton: false,
        //                 timer: 3000
        //             });
        //             if ($.isEmptyObject(data.error)) {
        //                 Toast.fire({
        //                     icon: 'success',
        //                     title: data.success,
        //                 });
        //             } else {
        //                 Toast.fire({
        //                     icon: 'error',
        //                     title: data.error,
        //                 });
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.log(xhr.responseText);
        //         }
        //     });
        // }


        $('.add-to-wishlist').on('click', function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');

            $.ajax({
                url: '/wishlist/add',
                method: 'POST',
                data: {
                    product_id: productId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Display success message or perform any additional actions
                    alert(response.message);
                },
                error: function(xhr, status, error) {
                    // Handle error scenarios
                    console.log(xhr.responseText);
                }
            });
        });
    </script>



</body>

</html>
