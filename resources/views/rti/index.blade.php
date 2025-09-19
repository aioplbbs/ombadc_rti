<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">RTI Requested</h4>
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
                                <td>{{$value->full_address}}</td>
                                <td>{{$value->request_information['subject']}}</td>
                                <!-- <td>{{$value->status}}</td> -->
                                <td>
                                    @switch($value->status)
                                        @case('Documents')
                                        <span class="badge bg-secondary">{{$value->status}}</span>
                                        @break
                                        @case('Submitted')
                                        <span class="badge bg-success">{{$value->status}}</span>
                                        @break
                                        @case('In Process')
                                        <span class="badge bg-secondary">{{$value->status}}</span>
                                        @break
                                        @case('Approve')
                                        <span class="badge bg-success">{{$value->status}}</span>
                                        @break
                                        @case('Reject')
                                        <span class="badge bg-danger">{{$value->status}}</span>
                                        @break
                                        @case('Responded')
                                        <span class="badge bg-secondary">{{$value->status}}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    @can('view rti')
                                    <a href="{{route('rti.show', $value->id)}}" class="fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View RTI"> <i class="text-primary ri-mac-line"></i></a>
                                    @endcan
                                    @can('update rti')
                                    <a href="{{route('rti.respond.index', $value->id)}}" class="fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Respond To this RTI"> <i class="text-primary ri-mail-send-fill"></i></a>
                                    @endcan
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