<div class="modal" tabindex="-1" role="dialog" id="modalChangePasswordManual">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form id="changePassword" action="changePassword.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" id="oldPassword" name="oldPassword" placeholder="Old Password" required>
                        <label for="floatingInput">Old Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" id="newPassword" name="newPassword" placeholder="New Password" required>
                        <label for="floatingPassword">New Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" id="reNewPassword" name="reNewPassword" placeholder="Re-Type New Password" required>
                        <label for="floatingPassword">Re-Type New Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" onclick="checkPass()">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>