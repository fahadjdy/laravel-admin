<!-- Container for Change Password form -->
<div class=" d-flex justify-content-center align-items-center py-5 ">
    <div class="form-container rounded p-4">
        <h3 class="text-center mb-4 text-primary">Change Password</h3>
        
        <!-- Change Password Form -->
        <form action="" method="post" id="changePasswordForm">
            <div class="form-group mb-3">
                <label for="oldPassword" class="text-dark">Old Password</label>
                <input type="password" id="oldPassword" name="oldPassword" class="form-control" required>
            </div>
            
            <div class="form-group mb-3">
                <label for="newPassword" class="text-dark">New Password</label>
                <input type="password" id="newPassword" name="newPassword" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="confirmPassword" class="text-dark">Confirm New Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
            </div>

            <!-- Submit button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg px-4 py-2">Change Password</button>
            </div>
        </form>
    </div>
</div>
