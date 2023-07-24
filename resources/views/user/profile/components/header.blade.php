{{-- profile area start --}}
<section class="profile__area pt-90 pb-50 grey-bg-2">
    <div class="container">
        <div class="profile__basic-inner pb-20 white-bg">
            <div class="row align-items-center">
                <div class="col-xxl-8 col-md-8">
                    <div class="profile__basic d-md-flex align-items-center">
                        <div class="profile__basic-thumb mr-30 position-relative">
                            <img src="{{ asset('storage/' . $profile->profile_picture) }}"
                                alt="{{ $profile->user->username }}-user-profile" class="object-cover-center"
                                id="photoProfile">
                            <div class="profile-image-edit-btn">
                                <div class="wrapper-edit">
                                    <button class="profile__info-btn" type="button" data-bs-toggle="modal"
                                        data-bs-target="#image_profile_edit_modal"><i
                                            class="fas fa-pen text-xs me-0"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="profile__basic-content">
                            <h3 class="profile__basic-title" id="titleProfileName">
                                Selamat Datang Kembali <span>{{ $profile->name }}</span>
                            </h3>
                            <p>{{ $profile->student_course_enrolls_count }} Buku dipinjam <button
                                    onclick="getContent('book')" class="btn-anchor">Lihat Buku</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="image_profile_edit_modal" tabindex="-1"
    aria-labelledby="image_profile_edit_modal"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="profile__edit-wrapper">
                <div class="profile__edit-close">
                    <button type="button" class="profile__edit-close-btn" data-bs-toggle="modal"
                        data-bs-target="#course_enroll_modal"><i class="fa-light fa-xmark"></i></button>
                </div>
                <form action="#" method="POST" id="formUpdateProfileImage" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="profile__edit-input">
                        <p style="margin-bottom: 25px !important">Foto Profil</p>
                        <figure class="profile-image-edit-wrapper">
                            <img src="{{ asset('storage/' . $profile->profile_picture) }}" alt="profile-image-preview"
                                id="imagePreview">
                        </figure>
                    </div>
                    <div class="profile__edit-input">
                        <div class="row">
                            <div class="col-6">
                                <input type="file" class="form-control form-control-file form-control-hidden"
                                    id="profileImage" name="profileImage" accept="image/*" required
                                    onchange="previewImage(event)">
                                <label for="profileImage"
                                    class="tp-btn w-100 btn-secondary btn-profile-photo">Edit</label>
                            </div>
                            <div class="col-6">
                                <button type="submit" id="updateProfileImageButton" class="tp-btn w-100">Ubah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var imagePreview = document.getElementById('imagePreview');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
</script>
{{-- profile area end --}}