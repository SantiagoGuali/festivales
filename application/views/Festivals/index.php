<div class="container">
    <h3 class="text-center">Lista de Festivales</h3>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar Festival</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($festivals): ?>
                <?php foreach ($festivals as $festival): ?>
                    <tr>
                        <td><?php echo $festival->id_festival; ?></td>
                        <td><?php echo $festival->name; ?></td>
                        <td><?php echo $festival->date_festival; ?></td>
                        <td><?php echo $festival->location; ?></td>
                        <td><?php echo $festival->state; ?></td>
                        <td>
                            <!-- Botón para abrir el modal de editar -->
                            <button class="btn btn-warning btnEditar" data-bs-toggle="modal" data-bs-target="#modalEditar"
                                data-id="<?php echo $festival->id_festival; ?>"
                                data-name="<?php echo $festival->name; ?>"
                                data-date_festival="<?php echo $festival->date_festival; ?>"
                                data-location="<?php echo $festival->location; ?>"
                                data-state="<?php echo $festival->state; ?>">
                                Editar
                            </button>
                            <a href="<?php echo site_url('Festivals/eliminar/' . $festival->id_festival); ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center">No hay festivales registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal para Registrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('Festivals/guardar'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistrarLabel">Registrar Festival</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre del festival" required>
                    <label for="date_festival" class="mt-3">Fecha:</label>
                    <input type="date" name="date_festival" class="form-control" required>
                    <label for="location" class="mt-3">Ubicación:</label>
                    <input type="text" name="location" class="form-control" placeholder="Ubicación del festival" required>
                    <label for="state" class="mt-3">Estado:</label>
                    <select name="state" class="form-control">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
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
            <form action="<?php echo site_url('Festivals/guardarCambios'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Festival</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Campo oculto para el ID del festival -->
                    <input type="hidden" name="id_festival" id="edit_id_festival">

                    <label for="edit_name">Nombre:</label>
                    <input type="text" name="name" id="edit_name" class="form-control" required>
                    
                    <label for="edit_date_festival" class="mt-3">Fecha:</label>
                    <input type="date" name="date_festival" id="edit_date_festival" class="form-control" required>
                    
                    <label for="edit_location" class="mt-3">Ubicación:</label>
                    <input type="text" name="location" id="edit_location" class="form-control" required>
                    
                    <label for="edit_state" class="mt-3">Estado:</label>
                    <select name="state" id="edit_state" class="form-control">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
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
            document.getElementById('edit_id_festival').value = this.getAttribute('data-id');
            document.getElementById('edit_name').value = this.getAttribute('data-name');
            document.getElementById('edit_date_festival').value = this.getAttribute('data-date_festival');
            document.getElementById('edit_location').value = this.getAttribute('data-location');
            document.getElementById('edit_state').value = this.getAttribute('data-state');
        });
    });
</script>
