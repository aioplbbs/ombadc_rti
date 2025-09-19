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
        .c-green{
            color: green;
        }
        .btn-success{
            background-color: green;
            border-color: green;
            color: white;
        }
        .c-black{
            color: black;
        }
        .c-yellow{
            color: #fecd00;
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

                       <h4 class="fw-bold mb-2 mt-2 fs-20 c-green">Change Password</h4>

                    <form action="{{ route('password.update') }}" method="post" class="text-start mb-3">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="mb-2">
                            <label class="form-label" for="example-email">Email</label>
                            <input readonly type="email" id="example-email" name="email" value="{{old('email', $request->email)}}" required autofocus class="form-control" placeholder="Enter your email">
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="example-password">Password</label>
                            <input type="password" id="example-password" name="password" class="form-control" placeholder="Enter your password">
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="confirm-password">{{ __('Confirm Password') }}</label>
                            <input type="password" id="confirm-password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success fw-semibold" type="submit">{{ __('Reset Password') }}</button>
                        </div>
                    </form>

                    <!-- <p class="mt-auto mb-0">
                        <script>document.write(new Date().getFullYear())</script> © <a href="https://allindiaonline.in" target="_blank">All India Online Pvt. Ltd.</a>
                    </p> -->
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>