<x-guest-layout>
    <style>
        .auth-bg {
            background: url('https://www.ombadc.in/images/innerbanner/history.jpg') no-repeat center center;
            background-size: cover;
        }

        .c-header-flex {
            display: flex;
            width: 100%;
            justify-content: center;
            gap: 5px;
            border-bottom: 3px solid green;
            padding: 0 0 10px 0;
        }

        .c-green {
            color: green;
        }

        .btn-success {
            background-color: green;
            border-color: green;
            color: white;
        }

        .c-black {
            color: black;
        }

        .c-yellow {
            color: #fecd00;
        }

        .c-text-warning {
            color: #3a2b01;
            background-color: #fff3cd;
            border-color: #ffeeba;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            font-size: 14px;
        }
    </style>
    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">

                    <div class="c-header-flex">
                        <img src="https://www.ombadc.in/images/logo.png" alt="" style="width: 100px;margin: auto;">

                        <h4 class="fw-semibold mb-2 mt-2 fs-18">Odisha Mineral Bearing Areas Development Corporation</h4>
                    </div>
                    <p class="c-text-warning">{{ __('Forgot your password? Please enter your registered Email id to reset your password.') }}</p>

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="post" class="text-start mb-3">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="example-email">Email</label>
                            <input type="email" id="example-email" name="email" class="form-control" placeholder="Enter your email">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success fw-semibold" type="submit">{{ __('Email Password Reset Link') }}</button>
                        </div>
                    </form>
                    <p>Go to ? <a href="{{route('login')}}" class="c-green">Login</a></p>
                    <!-- <p class="mt-auto mb-0">
                        <script>document.write(new Date().getFullYear())</script> © <a href="https://allindiaonline.in" target="_blank">All India Online Pvt. Ltd.</a>
                    </p> -->
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>