<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">RTI of {{$rti->full_name}}</h4>
            </div>
            <div class="card-body">
                <p><strong>Full name of the applicant</strong>: {{$rti->full_name}}</p>
                <p><strong>Name of the {{$rti->gardian_type}}</strong>: {{$rti->gardian_name}}</p>
                <p><strong>Particulars in respect of Identity of the applicant</strong>: {{$rti->identity}}</p>
                <h5>Particulars of information solicited</h5>
                <p><b>Subject</b>: {{$rti->request_information['subject']??""}}</p>
                <p><b>Period</b>: {{$rti->request_information['period_from']??""}} to {{$rti->request_information['period_to']??""}}</p>
                <p>
                    <b>Specific details of information required</b>: <br>
                    {!!$rti->request_information['description']??""!!}
                </p>

                <p><b>Has the information been provided earlier?</b>: {{$rti->is_info_given=="1"?"Yes":"No"}}</p>
                <p><b>Is this information not made available by the Public authority?</b>: {{$rti->info_by_authority=="1"?"Yes":"No"}}</p>
                <p><b>Have you deposited application fee?</b>: {{$rti->application_fee=="1"?"Yes":"No"}}</p>
                <p><b>Application fee Challan No.</b>: {{$rti->application_fee_challan}}</p>
                <p><b>Whether belongs to BPL category?</b>: {{$rti->is_bpl=="1"?"Yes":"No"}}</p>

                <h5>Permanent Address</h5>
                <p><b>Permanent Address</b>: {{implode(", ", array_filter($rti->permanent_address))}}</p>
                <h5>Concent</h5>
                <p><b>Place</b>: {{$rti->concent['place']}}, <b>Date</b>: {{$rti->concent['date']}}</p>

                @if(!empty($rti->responds))
                @foreach($rti->responds as $value)
                <div class="bg-gray">
                    <h3>{{$value->subject}}</h3>
                    <p>{{$value->message}}</p>
                    @foreach($value->getMedia('mail_attachment') as $media)
                    <p>{{$media->getPath()}}</p>
                    @endforeach
                </div>
                @endforeach
                @endif
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        @can('update rti')
                        <a href="{{route('rti.status', ['id' => $rti->id, 'status'=>'Approve'])}}" class="btn btn-primary btn-sm">Approve</a>
                        <a href="{{route('rti.status', ['id' => $rti->id, 'status'=>'Reject'])}}" class="btn btn-danger btn-sm">Reject</a>
                        @endcan
                    </div>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    @push('script')
    <script>
    </script>
    @endpush
</x-app-layout>