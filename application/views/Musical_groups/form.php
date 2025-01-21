
    <br>
    <div class="card-title text-center">
        <h3><b><?= isset($is_update) && $is_update ? 'Update Musical Group' : 'Add New Musical Group'; ?></b></h3>
    </div>
    <br>
    <div class="container">
        <form id="musicalGroupForm" action="<?= isset($is_update) && $is_update ? site_url('musicalgroups/update/' . $musical_group['id_musical']) : site_url('musicalgroups/save'); ?>" method="post">
            <div class="form-group">
                <label for="name"><b>Name:</b></label>
                <input type="text" name="name" class="form-control" id="name" value="<?= isset($musical_group['name']) ? $musical_group['name'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="num_members"><b>Number of Members:</b></label>
                <input type="number" name="num_members" class="form-control" id="num_members" value="<?= isset($musical_group['num_members']) ? $musical_group['num_members'] : ''; ?>" required min="1">
            </div>
            <div class="form-group">
                <label for="region"><b>Region:</b></label>
                <input type="text" name="region" class="form-control" id="region" value="<?= isset($musical_group['region']) ? $musical_group['region'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="representative"><b>Representative:</b></label>
                <select name="representative" class="form-control selectpicker" id="representative" required  data-live-search="true">
                    <option value="">--SELECT--</option>
                    <?php foreach ($staff as $rep): ?>
                        <option value="<?php echo $rep['id_staff']; ?>" 
                            <?php echo isset($musical_group['representative']) && $musical_group['representative'] == $rep['id_staff'] ? 'selected' : ''; ?>>
                            <?php echo $rep['last_name'] . ' ' . $rep['firs_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><?= isset($is_update) && $is_update ? 'Update' : 'Save'; ?></button>
            <a href="<?= site_url('musicalgroups'); ?>" class="btn btn-danger">Cancel</a>
        </form>
    </div>
    <br>

<!-- Validaciones del lado del cliente -->
<script>
    $(document).ready(function () {
        $("#musicalGroupForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
                num_members: {
                    required: true,
                    digits: true,
                    min: 1
                },
                region: {
                    required: true,
                    minlength: 3,
                    maxlength: 200
                },
                representative: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter the group name.",
                    minlength: "The group name must be at least 3 characters long.",
                    maxlength: "The group name must not exceed 100 characters."
                },
                num_members: {
                    required: "Please enter the number of members.",
                    digits: "Only digits are allowed.",
                    min: "The number of members must be at least 1."
                },
                region: {
                    required: "Please enter the region.",
                    minlength: "The region must be at least 3 characters long.",
                    maxlength: "The region must not exceed 200 characters."
                },
                representative: {
                    required: "Please select a representative."
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
