<x-guest-layout>

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">

                    <h4 class="fw-semibold mb-2 mt-2 fs-18">Application Setup</h4>

                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="mb-4 font-medium text-sm text-danger-600">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <form action="{{ route('setup.init') }}" method="post" class="text-start mb-3">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Application URL</label>
                            <input type="text" name="app_url" class="form-control" placeholder="http://localhost">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Database Host</label>
                            <input type="text" name="db_host" class="form-control" placeholder="e.g., localhost">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Database Name</label>
                            <input type="text" name="db_name" class="form-control" placeholder="Enter your database name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Database Username</label>
                            <input type="text" name="db_user" class="form-control" placeholder="Enter your database username">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Database Password</label>
                            <input type="password" name="db_password" class="form-control" placeholder="Enter your database password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Database Port</label>
                            <input type="text" name="db_port" class="form-control" placeholder="3306 (optional)">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary fw-semibold" type="submit">Install</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
