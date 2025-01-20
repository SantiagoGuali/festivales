<div class="container">
    <h3 class="text-center">Lista de Inscripciones</h3>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar Inscripción</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID del Grupo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($inscriptions): ?>
                <?php foreach ($inscriptions as $inscription): ?>
                    <tr>
                        <td><?php echo $inscription->id_inscription; ?></td>
                        <td><?php echo $inscription->group_id; ?></td>
                        <td><?php echo $inscription->state ? 'Activo' : 'Inactivo'; ?></td>
                        <td>
                            <!-- Botón para abrir el modal de editar -->
                            <button class="btn btn-warning btnEditar" data-bs-toggle="modal" data-bs-target="#modalEditar"
                                data-id="<?php echo $inscription->id_inscription; ?>"
                                data-group_id="<?php echo $inscription->group_id; ?>"
                                data-state="<?php echo $inscription->state; ?>">
                                Editar
                            </button>
                            <a href="<?php echo site_url('Inscriptions/eliminar/' . $inscription->id_inscription); ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center">No hay inscripciones registradas.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal para Registrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('Inscriptions/guardar'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistrarLabel">Registrar Inscripción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="group_id">ID del Grupo:</label>
                    <input type="number" name="group_id" class="form-control" placeholder="ID del grupo" required>
                    <label for="state" class="mt-3">Estado:</label>
                    <select name="state" class="form-control">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
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
            <form action="<?php echo site_url('Inscriptions/guardarCambios'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Inscripción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Campo oculto para el ID de la inscripción -->
                    <input type="hidden" name="id_inscription" id="edit_id_inscription">

                    <label for="edit_group_id">ID del Grupo:</label>
                    <input type="number" name="group_id" id="edit_group_id" class="form-control" placeholder="ID del grupo" required>
                    
                    <label for="edit_state" class="mt-3">Estado:</label>
                    <select name="state" id="edit_state" class="form-control">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
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
    // Cargar datos en el modal de editar
    document.querySelectorAll('.btnEditar').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('edit_id_inscription').value = this.getAttribute('data-id');
            document.getElementById('edit_group_id').value = this.getAttribute('data-group_id');
            document.getElementById('edit_state').value = this.getAttribute('data-state');
        });
    });
</script>
