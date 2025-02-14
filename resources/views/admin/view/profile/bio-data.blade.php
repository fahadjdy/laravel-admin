<div class="">
    <form action="" method="post" id="bioDataForm" class="">
        @csrf
        @method('put')
        <div class="form-container rounded">
            
            <div class="row my-2">
                <!-- First Name & Slogan fields in the same row -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="text-primary">Name :</label>
                        <input type="text" id="name" name="name" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="slogan" class="text-primary">Slogan :</label>
                        <input type="text" id="slogan" name="slogan" class="form-control" value="We deliver the quality">
                    </div>
                </div>
            </div>
            
            <div class="row my-2">
                <!-- Email and Contact fields in the same row -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="text-primary">Email :</label>
                        <input type="email" id="email" name="email" class="form-control" value="fahadjdy@gmail.com">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact" class="text-primary">Contact :</label>
                        <input type="number" id="contact" name="contact" class="form-control" value="9054479848">
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <!-- Address field with CKEditor -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address" class="text-primary">Address :</label>
                        <textarea id="address" name="address" class="form-control" rows="6">basu</textarea>
                    </div>
                </div>
            </div>

            <!-- Save button -->
            <div class="row mt-3 justify-content-center">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary save-btn" id="save-btn">
                        Save <i class="fa-duotone fa-solid fa-floppy-disk"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

