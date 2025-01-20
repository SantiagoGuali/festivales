
    <br>
    <div class="card-title text-center">
        <h3><b>Musical Groups List</b></h3>
    </div>
    <br>
    <div class="container">
        <a href="<?php echo site_url('musicalgroups/add'); ?>" class="btn btn-outline-success mb-3">+ Add New Group</a>
        <table class="table table-bordered table-striped" id="musicalGroupsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Number of Members</th>
                    <th>Region</th>
                    <th>Representative</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($musical_groups as $group): ?>
                    <tr>
                        <td><?php echo $group['id_musical']; ?></td>
                        <td><?php echo $group['name']; ?></td>
                        <td><?php echo $group['num_members']; ?></td>
                        <td><?php echo $group['region']; ?></td>
                        <td>
                            <?php echo $group['representative_last_name'] . ' ' . $group['representative_first_name']; ?>
                        </td>
                        <td class="text-center">
                            <a href="<?php echo site_url('musicalgroups/edit/' . $group['id_musical']); ?>" class="btn btn-outline-success btn-sm" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="<?php echo site_url('musicalgroups/delete/' . $group['id_musical']); ?>" onclick="return confirm('Are you sure you want to delete this group?');" class="btn btn-outline-danger btn-sm" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<script>
    $(document).ready(function () {
        $('#musicalGroupsTable').DataTable();
    });
</script>
