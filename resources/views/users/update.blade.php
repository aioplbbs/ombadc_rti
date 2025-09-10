<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Update User</h4>
            </div>
            <div class="card-body">
                <form action="{{route('users.update', $user->id)}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                <div class="row">
                    
                    <div class="col-xl-3">
                        <div class="mb-3">
                            <label for="example-fileinput" class="form-label">Default file input</label>
                            <input type="file" id="example-fileinput" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="userType" class="form-label">User Type</label>
                            <select id="userType" name="role" class="form-select">
                                <option>Choose</option>
                                @php
                                $Urole = $user->getRoleNames()->toArray();
                                @endphp
                                @foreach($roles as $role)
                                <option value="{{$role}}" {{(in_array($role, $Urole)?"selected":"")}}>{{$role}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Change Password</label>
                            <input type="text" id="password" name="password" class="form-control">
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