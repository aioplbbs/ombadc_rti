<x-app-layout>
    <div class="page-container">
        <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Total Registered HHs">
                                    Total Registered HHs</h5>
                                <h3 class="my-2 py-1 fw-bold">{{$cards['hhs']??0}}</h3>
                            </div>
                            <div class="avatar-xl flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-42">
                                    <iconify-icon icon="solar:bill-list-bold-duotone"></iconify-icon>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Total Registered Population">Total Registered Population</h5>
                                <h3 class="my-2 py-1 fw-bold">{{$cards['population']['total']??0}}</h3>
                            </div>
                            <div class="avatar-xl flex-shrink-0">
                                <span class="avatar-title bg-success-subtle text-success rounded-circle fs-42">
                                    <iconify-icon icon="solar:wad-of-money-bold-duotone"></iconify-icon>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Total Number of GPs">Total Number of GPs
                                </h5>
                                <h3 class="my-2 py-1 fw-bold">{{$cards['village']??0}}</h3>
                            </div>
                            <div class="avatar-xl flex-shrink-0">
                                <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-42">
                                    <iconify-icon icon="solar:user-plus-bold-duotone"></iconify-icon>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Total  Number of Villages">Total  Number of Villages</h5>
                                <h3 class="my-2 py-1 fw-bold">{{$cards['gp']??0}}</h3>
                            </div>
                            <div class="avatar-xl flex-shrink-0">
                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-42">
                                    <iconify-icon icon="solar:home-smile-angle-broken"></iconify-icon>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>

    @push('script')
    
    @endpush
</x-app-layout>