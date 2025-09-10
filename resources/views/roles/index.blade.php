<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Roles List</h4>
                <button type="button" class="btn btn-primary btn-sm save" data-bs-toggle="modal" data-bs-target="#standard-modal"> Add Role </button>
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Guard Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            @php
                            $i = 1;
                            @endphp
                            @foreach($roles as $key => $value)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$value['name']}}</td>
                                <td>{{$value['guard_name']}}</td>
                                <td class="text-center text-muted">
                                    <a href="javascript:;" class="editPermission fs-20 p-1" data-bs-toggle="modal" data-bs-target="#update-modal" data-name="{{$value->name}}" data-guard="{{$value->guard_name}}" data-id="{{$value->id}}"> <i class="text-primary ri-edit-line"></i></a>
                                    <a href="javascript:;" class=" fs-20 p-1" onclick="deleteFunction(`{{route('roles.destroy', $value->id)}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i class="text-danger ri-delete-bin-line"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    <!-- Standard modal content -->
    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Role</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{route('roles.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Role Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Role Name">
                    </div>
                    <div class="mb-3">
                        <label for="gurad" class="form-label">Guard</label>
                        <input type="text" id="gurad" name="guard_name" class="form-control" placeholder="Enter Guard Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Standard modal content -->
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="update-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="update-modalLabel">Edit Permission</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="#" method="post" id="updateForm">
                @method("patch")
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Permission Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Permission Name">
                    </div>
                    <div class="mb-3">
                        <label for="gurad" class="form-label">Guard</label>
                        <input type="text" id="gurad" name="guard_name" class="form-control" placeholder="Enter Guard Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @push('script')
    <script>
        $(document).on("click", ".editPermission", function () {
            let id = $(this).data("id");
            let name = $(this).data("name");
            let guard = $(this).data("guard");
            $("#updateForm").attr("action", "{{route('roles.index')}}"+"/"+id);
            $("#updateForm input[name='name']").val(name);
            $("#updateForm input[name='guard_name']").val(guard);
        });
    </script>
    @endpush
</x-app-layout>