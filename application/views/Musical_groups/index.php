<div class="container">
    <div class="row">
        <div class="col-md-12 text-right mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar Grupo Musical</button>
        </div>

        <div class="col-md-12">
            <h3 class="text-center">LISTADO DE GRUPOS MUSICALES</h3>
            <?php if ($musical_groups): ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Número de Miembros</th>
                            <th>Región</th>
                            <th>Representante</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($musical_groups as $group): ?>
                            <tr>
                                <td><?php echo $group->id_musical; ?></td>
                                <td><?php echo $group->name; ?></td>
                                <td><?php echo $group->num_members; ?></td>
                                <td><?php echo $group->region; ?></td>
                                <td><?php echo $group->representative; ?></td>
                                <td>
                                    <button class="btn btn-warning btnEditar" data-bs-toggle="modal" data-bs-target="#modalEditar"
                                        data-id="<?php echo $group->id_musical; ?>"
                                        data-name="<?php echo $group->name; ?>"
                                        data-num_members="<?php echo $group->num_members; ?>"
                                        data-region="<?php echo $group->region; ?>"
                                        data-representative="<?php echo $group->representative; ?>">
                                        Editar
                                    </button>
                                    <a href="<?php echo site_url('Musical_group/eliminar/' . $group->id_musical); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-danger text-center">No hay grupos musicales registrados.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal para Registrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('Musical_group/guardar'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistrarLabel">Registrar Grupo Musical</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="name" class="form-control" placeholder="Nombre del grupo" required>
                    <input type="number" name="num_members" class="form-control mt-3" placeholder="Número de miembros">
                    <input type="text" name="region" class="form-control mt-3" placeholder="Región">
                    <input type="number" name="representative" class="form-control mt-3" placeholder="ID del representante" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('Musical_group/guardarCambios'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Grupo Musical</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_musical" id="edit_id_musical">
                    <input type="text" name="name" id="edit_name" class="form-control" placeholder="Nombre del grupo" required>
                    <input type="number" name="num_members" id="edit_num_members" class="form-control mt-3" placeholder="Número de miembros">
                    <input type="text" name="region" id="edit_region" class="form-control mt-3" placeholder="Región">
                    <input type="number" name="representative" id="edit_representative" class="form-control mt-3" placeholder="ID del representante" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btnEditar').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('edit_id_musical').value = this.getAttribute('data-id');
            document.getElementById('edit_name').value = this.getAttribute('data-name');
            document.getElementById('edit_num_members').value = this.getAttribute('data-num_members');
            document.getElementById('edit_region').value = this.getAttribute('data-region');
            document.getElementById('edit_representative').value = this.getAttribute('data-representative');
        });
    });
</script>
