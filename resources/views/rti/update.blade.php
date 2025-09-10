<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Update Account</h4>
            </div>
            <div class="card-body">
                <form action="{{route('accounts.update', $account->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Domain</label>
                            <input type="text" id="name" name="domain" class="form-control" value="{{$account->domain}}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" id="email" name="username" class="form-control" value="{{$account->username}}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" id="password" name="password" class="form-control" value="{{$account->password}}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Cpanel</label>
                            <input type="text" id="password" name="cpanel" class="form-control" value="{{$account->cpanel}}">
                        </div>
                    </div>
                    <div class="col-xl-3"></div>
                    <div class="col-xl-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>