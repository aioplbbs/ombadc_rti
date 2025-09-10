<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> AIO MIS </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->

        <!-- Sweet Alert css-->
        <link href="{{asset('assets/vendor/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Vendor css -->
        <link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Theme Config Js -->
        <script src="{{asset('assets/js/config.js')}}"></script>

    </head>
    <body>
        
        <div class="wrapper">
            @include('navigation-menu')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="page-content">
                {{ $slot }}
                <!-- container -->
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="page-container">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start">
                                <script>document.write(new Date().getFullYear())</script> © AIO 
                                <!-- <span class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">ESIR</span> -->
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        
        <!--  Modal content for the Large example -->
        <div class="modal fade" id="bs-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="spinner-border text-primary m-2" role="status"></div>
                    </div>
                </div>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
            

            <!-- Page Heading -->
            <!-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif -->

            <!-- Page Content -->
            

        @stack('modals')

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{asset('assets/vendor/sweetalert2/sweetalert2.min.js')}}"></script>

        <script>
            function customAlart(type, content){
                Swal.fire({
                    icon: type,
                    html: content,
                    showConfirmButton: !1,
                    showCloseButton: !0,
                    timerProgressBar: !0,
                    timer: 5e3,
                    customClass: {
                        confirmButton: "btn btn-primary"
                    },
                    buttonsStyling: !1
                });
            }

            function deleteFunction(url) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "This action cannot be undone!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    customClass: {
                        confirmButton: "btn btn-danger",
                        cancelButton: "btn btn-secondary ms-2"
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Create a hidden form and submit it
                        let form = document.createElement('form');
                        form.method = 'POST';
                        form.action = url;

                        let token = document.createElement('input');
                        token.type = 'hidden';
                        token.name = '_token';
                        token.value = "{{ csrf_token() }}";

                        let method = document.createElement('input');
                        method.type = 'hidden';
                        method.name = '_method';
                        method.value = 'DELETE';

                        form.appendChild(token);
                        form.appendChild(method);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }


            @if (session('success'))
            customAlart("success", "{{session('success')}}");
            @endif
            @if ($errors->any())
                var error = "";
                @foreach ($errors->all() as $error)
                    error += "<li>{{ $error }}</li>";
                @endforeach
                customAlart("warning", "<ul>"+error+"</li>");
            @endif
        </script>

        @stack('script')
        
        @livewireScripts
    </body>
</html>
