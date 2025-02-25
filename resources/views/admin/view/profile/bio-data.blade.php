<div class="">
    <form action="" method="post" id="bioDataForm">
        @csrf
        @method('post')
        <div class="form-container rounded p-4 border">
            
            <!-- Hidden ID Field -->
            <input type="hidden" name="bio-id" value="{{ $profile->id }}" class="form-control">

            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bio-name" class="text-primary">Name :</label>
                        <input type="text" id="bio-name" name="bio-name" class="form-control" value="{{ $profile->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bio-slogan" class="text-primary">Slogan :</label>
                        <input type="text" id="bio-slogan" name="bio-slogan" class="form-control" value="{{ $profile->slogan }}">
                    </div>
                </div>
            </div>
            
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bio-email-1" class="text-primary">Email 1:</label>
                        <input type="email" id="bio-email-1" name="bio-email-1" class="form-control" value="{{ $profile->email_1 }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bio-email-2" class="text-primary">Email 2 <small>(optional)</small> :</label>
                        <input type="email" id="bio-email-2" name="bio-email-2" class="form-control" value="{{ $profile->email_2 }}">
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bio-contact-1" class="text-primary">Contact 1:</label>
                        <input type="number" id="bio-contact-1" name="bio-contact-1" class="form-control" value="{{ $profile->contact_1 }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bio-contact-2" class="text-primary">Contact 2 <small>(optional)</small>:</label>
                        <input type="number" id="bio-contact-2" name="bio-contact-2" class="form-control" value="{{ $profile->contact_2 }}">
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="bio-about" class="text-primary">About</label>
                        <textarea id="bio-about" name="bio-about" class="form-control" rows="4">{{ $profile->about }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="bio-address-1" class="text-primary">Address 1:</label>
                        <textarea id="bio-address-1" name="bio-address-1" class="form-control" rows="4">{{ $profile->address_1 }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="bio-address-2" class="text-primary">Address 2 <small>(optional)</small> :</label>
                        <textarea id="bio-address-2" name="bio-address-2" class="form-control" rows="4">{{ $profile->address_2 }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Save button -->
            <div class="row mt-3 justify-content-center">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary save-btn" id="bio-save-btn">
                        Save <i class="fa-solid fa-floppy-disk"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
