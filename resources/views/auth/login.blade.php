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


                       <h4 class="fw-bold mb-2 mt-2 fs-20 c-green">RTI Portal</h4>


                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if ($errors->any())
                
                            @foreach ($errors->all() as $error)
                              

                                <div class="alert alert-danger alert-dismissible d-flex align-items-center border-2 border border-danger" role="alert"> 
                                    <div class="lh-1">{{ $error }}</div>
                                </div>
                            @endforeach
                        
                    @endif

                    <form action="{{ route('login') }}" method="post" class="text-start mb-3">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="example-email">Email / Mobile</label>
                            <input type="text" id="example-email" name="email" class="form-control" placeholder="Enter your Email or Mobile No.">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="example-password">Password</label>
                            <input type="password" id="example-password" name="password" class="form-control" placeholder="Enter your password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="example-password">Forgot your Password ? </label> <a href="{{route('user.login')}}" class="c-green">Login with OTP</a>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>

                            <a href="{{route('password.request')}}" class="text-muted border-bottom border-dashed">Forget Password</a>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success fw-semibold " type="submit">Login</button>
                        </div>
                    </form>

                    <!-- <p>OR</p> -->
                    <p>Don't have Account ? <a href="{{route('register')}}" class="c-green">Register</a></p>


                    <!-- <p class="mt-auto mb-0">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © <a href="https://ombadc.in" target="_blank">Odisha Mineral Bearing Areas Development Corporation (OMBADC)</a>
                    </p> -->
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>