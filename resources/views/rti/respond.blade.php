<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Respond to RTI Filled By {{$rti->full_name}}</h4>
            </div>
            <div class="card-body">
                <form action="{{route('rti.respond.store', $rti->id)}}" method="post">
                    @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Send To</label>
                            <input type="text" class="form-control" value="{{$rti->full_name}} <{{$rti->user->email}}>" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control" value="Respond: {{$rti->request_information['subject']}}" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="date" class="form-label">Message</label>
                            <textarea name="message" class="form-control" rows="6" placeholder="Enter Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="formFileMultiple01" class="form-label">Attachment (Multiple)</label>
                            <input class="form-control" type="file" name="attachment" id="formFileMultiple01" multiple>
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
</x-app-layout>