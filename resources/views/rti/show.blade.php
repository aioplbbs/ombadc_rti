<x-app-layout>
    <style>

    </style>
    <div class="page-container row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom border-dashed align-items-center text-center">
                    <h4 class="header-title">FORM-A</h4>
                    <p style="margin: 0;">[ See Rule -4 (1) ] Application for Information under section 6 (1) of RTI Act, 2005.</p>
                </div>
                <div class="card-body">



                    <!-- <div class="form-section"> -->
                    <h5 class="c-heading">Applicant Information</h5>
                    <div class="info-item">
                        <span class="info-label">Full name of the applicant:</span>
                        <span class="info-content">{{$rti->full_name}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Name of the {{$rti->gardian_type}}:</span>
                        <span class="info-content">{{$rti->gardian_name}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Particulars in respect of Identity of the applicant:</span>
                        <span class="info-content">{{$rti->identity}}</span>
                    </div>
                    <!-- </div> -->

                    <!-- <div class="form-divider"></div> -->
                    <!-- <div class="form-section"> -->
                    <h5 class="c-heading">Particulars of information solicited</h5>
                    <div class="info-item">
                        <span class="info-label">Subject:</span>
                        <span class="info-content">{{$rti->request_information['subject']??""}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Period:</span>
                        <span class="info-content">{{$rti->request_information['period_from']??""}} to {{$rti->request_information['period_to']??""}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Specific details of information required:</span>
                        <div class="info-content">
                            {!!$rti->request_information['description']??""!!}
                        </div>
                    </div>
                    <!-- </div> -->


                    <!-- <div class="form-divider"></div> -->
                    <!-- <div class="form-section"> -->
                    <h5 class="c-heading">Additional Information</h5>
                    <div class="info-item">
                        <span class="info-label">Has the information been provided earlier?</span>
                        <span class="info-content">{{$rti->is_info_given=="1"?"Yes":"No"}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Is this information not made available by the Public authority?</span>
                        <span class="info-content">{{$rti->info_by_authority=="1"?"Yes":"No"}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Have you deposited application fee?</span>
                        <span class="info-content">{{$rti->application_fee=="1"?"Yes":"No"}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Application fee Challan No.:</span>
                        <span class="info-content">{{$rti->application_fee_challan}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Whether belongs to BPL category?</span>
                        <span class="info-content">{{$rti->is_bpl=="1"?"Yes":"No"}}</span>
                    </div>
                    <!-- </div> -->
                    <!-- <div class="form-divider"></div> -->

                    <!-- <div class="form-section"> -->
                    <h5 class="c-heading">Permanent Address</h5>
                    <div class="info-item">
                        <span class="info-label">Permanent Address:</span>
                        <span class="info-content">{{implode(", ", array_filter($rti->permanent_address))}}</span>
                    </div>
                    <!-- </div> -->
                    <!-- <div class="form-divider"></div> -->
                    <!-- <div class="form-section"> -->
                    <h5 class="c-heading">Consent</h5>
                    <div class="info-item">
                        <span class="info-label">Place:</span>
                        <span class="info-content">{{$rti->concent['place']}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Date:</span>
                        <span class="info-content">{{$rti->concent['date']}}</span>
                    </div>
                    <!-- </div> -->
                </div> <!-- end card body-->
            </div>
        </div> <!-- end card -->
        <div class="col-md-4">



            @can('update rti')
            <div class="card">
                <!-- <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                    <h4 class="header-title">Application Status</h4>
                </div> -->

                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center p-3 gap-2">
                    <a href="{{route('rti.status', ['id' => $rti->id, 'status'=>'Approve'])}}" class="btn btn-primary btn-sm">Approve</a>
                    <a href="{{route('rti.status', ['id' => $rti->id, 'status'=>'Reject'])}}" class="btn btn-danger btn-sm">Reject</a>

                </div>
            </div>

</div>
       
        @endcan



        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Responds</h4>
            </div>
            @if(!empty($rti->responds))
            <div class="card-body">
                @foreach($rti->responds as $value)
                <div class="bg-gray">
                    <div class="respond-date">
                        <i class="far fa-clock"></i> April 18, 2023 at 10:30 AM
                    </div>
                    <h5>{{$value->subject}}</h5>
                    <p>{{$value->message}}</p>

                    <div class="attachment-item">
                        @foreach($value->getMedia('mail_attachment') as $media)
                        <i class="ri-download-line fs-32 lh-1"></i>
                        <span>Attachments</span>
                        <a href="{{$media->getPath()}}" class="btn btn-sm btn-success ms-auto" download>Download</a>

                        @endforeach
                    </div>

                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>


    </div>

    @push('script')
    <script>
    </script>
    @endpush
</x-app-layout>