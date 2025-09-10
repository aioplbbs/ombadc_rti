<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Accounts List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Full Name</th>
                                <th>Permanent Address</th>
                                <th>Requested Information</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($rti as $key => $value)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$value->full_name}}</td>
                                <td>{{$value->permanent_address}}</td>
                                <td>{{$value->request_information}}</td>
                                <td>{{$value->status}}</td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->

                {{ $rti->links() }}
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    @push('script')
    <script>
    </script>
    @endpush
</x-app-layout>