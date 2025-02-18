<div class="form-container rounded">
    <table>
        <tr>
            <td width="10%" class="text-primary">Favicon :</td>
            <td>
                <div class="position-relative">
                    <img src="{{ url($profile->favicon) }}" width="50px" height="50px" id="favicon-img">
                    <div class="favicon-img-overlay position-absolute">
                        <div class="circle">
                            <i class="fa-duotone fa-solid fa-camera" id="favicon-icon"></i>
                            <input type="file" class="d-none" id="favicon-file" name="favicon" accept="image/*">
                        </div>
                    </div>
                </div>
            </td>
            <td width="10%" class="text-primary">Watermark :</td>
            <td>
                <div class="position-relative">
                    <img src="{{ $profile->watermark ? url($profile->watermark) : asset('admin/img/auth/login-bg.jpg') }}" width="50px" height="50px" id="watermark-img">
                    <div class="watermark-img-overlay position-absolute">
                        <div class="circle">
                            <i class="fa-duotone fa-solid fa-camera" id="watermark-icon"></i>
                            <input type="file" class="d-none" id="watermark-file" name="watermark" accept="image/*">
                        </div>
                    </div>
                </div>
            </td>
        </tr>        
    </table>

    <hr>
    <form id="siteDetailsForm" action="{{ route('profile.site.detail.update', $profile->id) }}" >
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

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>

</div>
