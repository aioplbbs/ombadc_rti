<x-app-layout>
    <div class="page-container">
        <div class="card">
            <!-- <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Apply RTI Application</h4>
                
            </div> -->
             <div class="card-header border-bottom border-dashed align-items-center text-center">
                <!-- <h4 class="header-title fs-20">Apply RTI Application</h4> -->
                    <h4 class="header-title fs-20">FORM-A</h4>
                    <p style="margin: 0;">[ See Rule -4 (1) ] Application for Information under section 6 (1) of RTI Act, 2005.</p>
                </div>
            <div class="card-body">
                <form action="{{route('rti.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <h4 class="c-heading">Basic Information</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full name of the applicant</label>
                                <input type="text" id="full_name" name="full_name" class="form-control" value="{{old('full_name')}}" placeholder="Enter Full Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-check-label">Name of the</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="gardian_type1" name="gardian_type" value="Father" class="form-check-input" {{ old('gardian_type') == 'Father' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gardian_type1">Father</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="gardian_type2" name="gardian_type" value="Husband" class="form-check-input" {{ old('gardian_type') == 'Husband' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gardian_type2">Husband</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" id="gardian_name" name="gardian_name" class="form-control" value="{{old('gardian_name')}}" placeholder="Enter Father / Husband">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="identity" class="form-label">Particulars in respect of Identity of the applicant</label>
                                <input type="text" id="identity" name="identity" class="form-control" value="{{old('identity')}}" placeholder="Enter Aadhaar No./ Passport/ Voter">
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4 class="c-heading">Particulars of information solicited</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject matter of Information</label>
                                <input type="text" id="subject" name="subject" class="form-control" value="{{old('subject')}}" placeholder="Enter Subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="subject" class="form-label">The period to which the information relates</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="period_from" class="form-control flatpickr-input" data-provider="flatpickr" data-date-format="Y-m-d" value="{{old('period_from')}}" placeholder="Period From">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="period_to" class="form-control flatpickr-input" data-provider="flatpickr" data-date-format="Y-m-d" value="{{old('period_from')}}" placeholder="Period To">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="subject" class="form-label">Specific details of information required</label>
                                <textarea name="description" class="form-control" rows="6" placeholder="Enter Specific details of information required">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4 class="c-heading">Additional Information</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Has the information been provided earlier?</label> <br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="is_info_given1" name="is_info_given" value="1" class="form-check-input" {{ old('is_info_given') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_info_given1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="is_info_given2" name="is_info_given" value="0" class="form-check-input" {{ old('is_info_given') == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_info_given2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Is this information not made available by the Public authority?</label> <br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="info_by_authority1" name="info_by_authority" value="1" class="form-check-input" {{ old('info_by_authority') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="info_by_authority1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="info_by_authority2" name="info_by_authority" value="0" class="form-check-input" {{ old('info_by_authority') == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="info_by_authority2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Have you deposited application fee?</label> <br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="application_fee1" name="application_fee" value="1" class="form-check-input" {{ old('application_fee') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="application_fee1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="application_fee2" name="application_fee" value="0" class="form-check-input" {{ old('application_fee') == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="application_fee2">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Whether belongs to BPL category?</label> <br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="is_bpl1" name="is_bpl" value="1" class="form-check-input" {{ old('is_bpl') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_bpl1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="is_bpl2" name="is_bpl" value="0" class="form-check-input" {{ old('is_bpl') == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_bpl2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="application_fee_challan" class="form-label">Application fee Challan No.</label>
                                <input type="text" id="application_fee_challan" name="application_fee_challan" class="form-control" value="{{old('application_fee_challan')}}" placeholder="Enter Challan No.">
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4 class="c-heading">Permanent Address</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">Address 1</label>
                                <input type="text" id="address1" name="address1" class="form-control" value="{{old('address1')}}" placeholder="Enter Address 1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" id="address2" name="address2" class="form-control" value="{{old('address2')}}" placeholder="Enter Address 2">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input type="text" id="pincode" name="pincode" class="form-control" value="{{old('pincode')}}" placeholder="Enter Pincode">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" id="city" name="city" class="form-control" value="{{old('city')}}" placeholder="Enter City">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" id="state" name="state" class="form-control" value="{{old('state')}}" placeholder="Enter State">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" id="country" name="country" class="form-control" value="INDIA" placeholder="Enter Country" disabled>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4 class="c-heading">Concent</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="place" class="form-label">Place</label>
                                <input type="text" id="place" name="place" class="form-control" value="{{old('place')}}" placeholder="Enter Place">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" id="date" name="date" class="form-control flatpickr-input" data-provider="flatpickr" data-date-format="Y-m-d" value="{{old('date')}}" placeholder="Enter Date">
                            </div>
                        </div>

                        <div class="col-xl-12" style="text-align: center;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    @push('script')
    <script>
        $("#pincode").on("change", function() {
            var d = $(this).val();
            $.post("{{url('ajax/pincode')}}", {
                pincode: d
            }, function(data) {
                console.log(data);
                $("#city").val(data.city);
                $("#state").val(data.state);
            });

        });
    </script>
    @endpush
</x-app-layout>