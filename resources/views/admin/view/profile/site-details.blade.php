<div class="form-container rounded">
    <table>
        <tr>
            <td width="10%" class="text-primary">Favicon :</td>
            <td>
                <div class="position-relative">
                    <img data-src="{{ $profile->favicon ? url($profile->favicon) : '' }}" width="50px" height="50px" id="favicon-img" class="lazy">
                    <div class="favicon-img-overlay position-absolute">
                        <div class="circle">
                            <i class="fa-duotone fa-solid fa-camera" id="favicon-icon"></i>
                            <input type="file" class="d-none" id="favicon-file" name="favicon" accept="image/*">
                        </div>
                    </div>
                </div>
            </td>
            <td width="10%" class="text-primary">About Image :</td>
            <td>
                <div class="position-relative">
                    <img data-src="{{ $profile->about_image ? url($profile->about_image) : '' }}" width="250px" height="250px" id="about_img" class="lazy">
                    <div class="watermark-img-overlay position-absolute">
                        <div class="circle">
                            <i class="fa-duotone fa-solid fa-camera" id="about-img-icon"></i>
                            <input type="file" class="d-none" id="about-img-file" name="about_img" accept="image/*">
                        </div>
                    </div>
                </div>
            </td>
        </tr>        
    </table>

    <hr>
    <form id="siteDetailsForm" action="{{ route('profile.site.detail.update') }}" >
        @csrf
        <div class="container mt-4">
            <div class="row align-items-center mb-3">
                <div class="col-md-3 text-primary">
                    <label for="is_watermark" class="form-label">Enable Watermark:</label>
                    <input type="checkbox" name="is_watermark" id="is_watermark" class="mx-2 form-check-input" {{ $profile->is_watermark ? 'checked' : '' }}>
                </div>
                <div class="col-md-3 text-primary">
                    <label for="is_maintenance" class="form-label">Maintenance Mode:</label>
                    <input type="checkbox" name="is_maintenance" id="is_maintenance" class="mx-2 form-check-input" {{ $profile->is_maintenance ? 'checked' : '' }}>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                   
                </div>
                <div class="col-md-8">

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>

</div>
