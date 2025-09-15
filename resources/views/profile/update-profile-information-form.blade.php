<div class="card">
    <div class="card-header border-bottom border-dashed d-flex align-items-center">
        <h4 class="header-title mb-0">Profile Information</h4>
    </div>

    <div class="card-body">
        <p class="text-muted">Update your account's profile information and email address.</p>

        <form wire:submit.prevent="updateProfileInformation" enctype="multipart/form-data">
            @csrf

            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{ photoName: null, photoPreview: null }" class="mb-4">
                    <label class="form-label d-block">Photo</label>

                    <!-- Profile Photo File Input -->
                    <input type="file" class="d-none"
                        wire:model="photo"
                        x-ref="photo"
                        x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo.files[0]);
                        " />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-circle" style="height: 80px; width: 80px; object-fit: cover;">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="d-block rounded-circle" style="height: 80px; width: 80px; background-size: cover; background-repeat: no-repeat; background-position: center;" :style="'background-image: url(' + photoPreview + ');'"></span>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-3">
                        <button class="btn btn-outline-primary btn-sm me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                            Select A New Photo
                        </button>

                        @if ($this->user->profile_photo_path)
                            <button type="button" class="btn btn-outline-danger btn-sm" wire:click="deleteProfilePhoto">
                                Remove Photo
                            </button>
                        @endif
                    </div>

                    @error('photo')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            @endif

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" class="form-control @error('state.name') is-invalid @enderror" wire:model.defer="state.name" autocomplete="name">
                @error('state.name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('state.email') is-invalid @enderror" wire:model.defer="state.email">
                @error('state.email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                    <div class="text-warning small mt-2">
                        Your email address is unverified.

                        <button type="button" class="btn btn-link btn-sm p-0 text-decoration-underline" wire:click.prevent="sendEmailVerification">
                            Click here to re-send the verification email.
                        </button>
                    </div>

                    @if ($this->verificationLinkSent)
                        <div class="text-success small mt-2">
                            A new verification link has been sent to your email address.
                        </div>
                    @endif
                @endif
            </div>

            <!-- Mobile -->
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input id="mobile" type="text" class="form-control @error('state.mobile') is-invalid @enderror" wire:model.defer="state.mobile" autocomplete="mobile">
                @error('state.mobile')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="d-flex align-items-center">
                @if (session()->has('message'))
                    <div class="text-success me-3">Saved.</div>
                @endif

                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
