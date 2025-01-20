    <br>
    <div class="card">
        <div class="card-title text-center">
            <h3><b>Employee List</b></h3>
        </div>
    </div>

    <div class="container">
        <br>
        <a href="<?php echo site_url()?>/Staff/add" class="btn btn-outline-success">+ Add</a>
        <br><br>
        <table class="table" id="staffTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Card</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($staff): ?>
                    <?php foreach ($staff as $member): ?>
                        <tr>
                            <td><?= htmlspecialchars($member->id_staff) ?></td>
                            <td><?= htmlspecialchars($member->id_card) ?></td>
                            <td><?= htmlspecialchars($member->last_name) ?></td>
                            <td><?= htmlspecialchars($member->firs_name) ?></td>
                            <td><?= htmlspecialchars($member->mail) ?></td>
                            <td><?= htmlspecialchars($member->phone) ?></td>
                            <td><?= htmlspecialchars($member->user_name) ?></td>
                            <td><?= htmlspecialchars($member->role) ?></td>
                            <td><?= $member->state ? 'Active' : 'Inactive' ?></td>
                            <td class="text-center">
                                <a href="<?php echo site_url('Staff/edit/' . $member->id_staff) ?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
								<a href="<?php echo site_url('Staff/delStaff/' . $member->id_staff); ?>" 
								class="btn btn-outline-danger" 
								onclick="return confirm('¿Está seguro de que desea eliminar este registro?');">
								<i class="fa-solid fa-trash"></i>
								</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-center">No data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

<script>
    // Inicializa DataTables
    $(document).ready(function() {
        $('#staffTable').DataTable();

    });
</script>
