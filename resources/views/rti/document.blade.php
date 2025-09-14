<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Upload Documents for RTI ({{$rti->request_information['subject']??""}})</h4>
            </div>
            <div class="card-body">
                <form action="{{route('rti.document.index', ['id'=> $rti->id])}}" method="post" enctype='multipart/form-data'>
                    @csrf
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h4>Documents</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Identity</label>
                            <input type="file" id="full_name" name="identity" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Challan</label>
                            <input type="file" id="full_name" name="challan" class="form-control" >
                        </div>
                    </div>
                    

                    <div class="col-xl-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    @push('script')
    
    @endpush
</x-app-layout>