<x-guest-layout>
    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                    
                    <img src="{{asset('logo.png')}}" alt="" style="width: 100px;margin: auto;">

                    <h4 class="fw-semibold mb-2 mt-2 fs-18">All India Online Pvt. Ltd.</h4>
                    <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

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
                            <button class="btn btn-primary fw-semibold" type="submit">{{ __('Email Password Reset Link') }}</button>
                        </div>
                    </form>

                    <p class="mt-auto mb-0">
                        <script>document.write(new Date().getFullYear())</script> © <a href="https://allindiaonline.in" target="_blank">All India Online Pvt. Ltd.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

