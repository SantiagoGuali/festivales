
    <br>
    <div class="card-title text-center">
        <h3><b><?= isset($is_update) && $is_update ? 'Update Staff' : 'Add New Staff'; ?></b></h3>
    </div>
    <br>
    <div class="container-fluid container">
        <div class="row">
            <div class="col-md-12">
                <form id="staffForm" action="<?= isset($is_update) && $is_update ? site_url('staff/update/' . $staff->id_staff) : site_url('staff/saveStaff'); ?>" method="post">
                    <div class="row">
                        <!-- Primera columna -->
                        <div class="col-md-6">
                            <label for="id_card"><b>ID Card:</b></label>
                            <input type="text" name="id_card" class="form-control" id="id_card" value="<?= isset($staff->id_card) ? $staff->id_card : ''; ?>">
                            <br>
                            <label for="last_name"><b>Last Name:</b></label>
                            <input type="text" name="last_name" class="form-control" id="last_name" value="<?= isset($staff->last_name) ? $staff->last_name : ''; ?>">
                            <br>
                            <label for="firs_name"><b>First Name:</b></label>
                            <input type="text" name="firs_name" class="form-control" id="firs_name" value="<?= isset($staff->firs_name) ? $staff->firs_name : ''; ?>">
                            <br>
                            <label for="mail"><b>Email:</b></label>
                            <input type="email" name="mail" class="form-control" id="mail" value="<?= isset($staff->mail) ? $staff->mail : ''; ?>">
							<label for="phone"><b>Phone:</b></label>
                            <input type="text" name="phone" class="form-control" id="phone" value="<?= isset($staff->phone) ? $staff->phone : ''; ?>">
                            <br>
                        </div>
                        
                        <!-- Segunda columna -->
                        <div class="col-md-6">
                            
                            <br>
                            <label for="user_name"><b>Username:</b></label>
                            <input type="text" name="user_name" class="form-control" id="user_name" value="<?= isset($staff->user_name) ? $staff->user_name : ''; ?>">
                            <br>
                            <?php if (!isset($is_update) || !$is_update): ?>
                                <label for="pass"><b>Password:</b></label>
                                <input type="password" name="pass" class="form-control" id="pass">
                                <br>
                            <?php endif; ?>
                            <label for="role"><b>Role:</b></label>
                            <select class="form-control selectpicker" id="role" name="role" data-live-search="true">
                                <option value="">--SELECT--</option>
                                <option value="Music boss" <?= isset($staff->role) && $staff->role == 'Music boss' ? 'selected' : ''; ?>>Music boss</option>
                                <option value="Assistant" <?= isset($staff->role) && $staff->role == 'Assistant' ? 'selected' : ''; ?>>Assistant</option>
                                <option value="Coordinator" <?= isset($staff->role) && $staff->role == 'Coordinator' ? 'selected' : ''; ?>>Coordinator</option>
                            </select>
                            <br>
                            <label for="state"><b>Status:</b></label>
                            <select class="form-control selectpicker" id="state" name="state">
                                <option value="1" <?= isset($staff->state) && $staff->state == 1 ? 'selected' : ''; ?>>Active</option>
                                <option value="0" <?= isset($staff->state) && $staff->state == 0 ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <?= isset($is_update) && $is_update ? 'Update' : 'Save'; ?>
                        </button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger" href="<?= site_url('staff'); ?>">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>




<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();

        $("#staffForm").validate({
            rules: {
                id_card: {
                    required: true,
                    minlength: 5
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                firs_name: {
                    required: true,
                    minlength: 2
                },
                mail: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                user_name: {
                    required: true,
                    minlength: 3
                },
                <?php if (!isset($is_update) || !$is_update): ?>
                pass: {
                    required: true,
                    minlength: 6
                },
                <?php endif; ?>
                role: {
                    required: true
                },
                state: {
                    required: true
                }
            },
            messages: {
                id_card: {
                    required: "Please enter the ID card.",
                    minlength: "The ID card must be at least 5 characters."
                },
                last_name: {
                    required: "Please enter the last name.",
                    minlength: "The last name must be at least 2 characters."
                },
                firs_name: {
                    required: "Please enter the first name.",
                    minlength: "The first name must be at least 2 characters."
                },
                mail: {
                    required: "Please enter the email.",
                    email: "Please enter a valid email address."
                },
                phone: {
                    required: "Please enter the phone number.",
                    digits: "Only digits are allowed.",
                    minlength: "The phone number must be 10 digits.",
                    maxlength: "The phone number must be 10 digits."
                },
                user_name: {
                    required: "Please enter the username.",
                    minlength: "The username must be at least 3 characters."
                },
                <?php if (!isset($is_update) || !$is_update): ?>
                pass: {
                    required: "Please enter the password.",
                    minlength: "The password must be at least 6 characters."
                },
                <?php endif; ?>
                role: {
                    required: "Please select a role."
                },
                state: {
                    required: "Please select a status."
                }
            },
            errorElement: "div",
            errorClass: "text-danger",
            highlight: function (element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
