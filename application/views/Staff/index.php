<br>
<div class="container">
    <div class="row">
        <!-- Botón para abrir el modal de registro -->
        <div class="col-md-12 text-right mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar Staff</button>
        </div>

        <!-- Listado de staff -->
        <div class="col-md-12">
            <h3 class="text-center">LISTADO DE STAFF</h3>
            <br>
            <?php if ($staff): ?>
                <table class="table table-bordered table-striped table-hover" id="tbl-staff">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Cédula</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($staff as $s): ?>
                            <tr>
                                <td class="text-center"><?php echo $s->id_staff; ?></td>
                                <td class="text-center"><?php echo $s->id_card; ?></td>
                                <td class="text-center"><?php echo $s->last_name; ?></td>
                                <td class="text-center"><?php echo $s->firs_name; ?></td>
                                <td class="text-center"><?php echo $s->mail; ?></td>
                                <td class="text-center"><?php echo $s->phone; ?></td>
                                <td class="text-center"><?php echo $s->role; ?></td>
                                <td class="text-center"><?php echo $s->state ? 'Activo' : 'Inactivo'; ?></td>
                                <td class="text-center">
                                    <!-- Botón para abrir el modal de editar -->
                                    <button class="btn btn-warning btnEditar" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalEditar"
                                        data-id="<?php echo $s->id_staff; ?>"
                                        data-id_card="<?php echo $s->id_card; ?>"
                                        data-last_name="<?php echo $s->last_name; ?>"
                                        data-firs_name="<?php echo $s->firs_name; ?>"
                                        data-mail="<?php echo $s->mail; ?>"
                                        data-phone="<?php echo $s->phone; ?>"
                                        data-role="<?php echo $s->role; ?>"
                                        data-state="<?php echo $s->state; ?>">
                                        Editar
                                    </button>
                                    <a href="<?php echo site_url('Staff/eliminar/' . $s->id_staff); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro que deseas eliminar este registro? ¡No podrás recuperarlo!');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <h3 style="color:red;" class="text-center">NO EXISTEN REGISTROS DE STAFF</h3>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal para Registrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo site_url('Staff/guardar'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistrarLabel">Registrar Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for=""><b>Cédula:</b></label>
                    <input type="text" name="id_card" id="id_card" class="form-control" placeholder="Ingrese el número de cédula" required>
                    <br>
                    <label for=""><b>Apellido:</b></label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Ingrese el apellido" required>
                    <br>
                    <label for=""><b>Nombre:</b></label>
                    <input type="text" name="firs_name" id="firs_name" class="form-control" placeholder="Ingrese el nombre" required>
                    <br>
                    <label for=""><b>Email:</b></label>
                    <input type="email" name="mail" id="mail" class="form-control" placeholder="Ingrese el correo electrónico" required>
                    <br>
                    <label for=""><b>Teléfono:</b></label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Ingrese el número de teléfono">
                    <br>
                    <label for=""><b>Usuario:</b></label>
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Ingrese el nombre de usuario" required>
                    <br>
                    <label for=""><b>Contraseña:</b></label>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Ingrese la contraseña" required>
                    <br>
                    <label for=""><b>Rol:</b></label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="">--SELECCIONE--</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="COORDINADOR">COORDINADOR</option>
                        <option value="STAFF">STAFF</option>
                    </select>
                    <br>
                    <label for=""><b>Estado:</b></label>
                    <select name="state" id="state" class="form-control">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo site_url('Staff/guardarCambios'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_staff" id="edit_id_staff">
                    <label for=""><b>Cédula:</b></label>
                    <input type="text" name="id_card" id="edit_id_card" class="form-control" required>
                    <br>
                    <label for=""><b>Apellido:</b></label>
                    <input type="text" name="last_name" id="edit_last_name" class="form-control" required>
                    <br>
                    <label for=""><b>Nombre:</b></label>
                    <input type="text" name="firs_name" id="edit_firs_name" class="form-control" required>
                    <br>
                    <label for=""><b>Email:</b></label>
                    <input type="email" name="mail" id="edit_mail" class="form-control" required>
                    <br>
                    <label for=""><b>Teléfono:</b></label>
                    <input type="text" name="phone" id="edit_phone" class="form-control">
                    <br>
                    <label for=""><b>Rol:</b></label>
                    <select name="role" id="edit_role" class="form-control" required>
                        <option value="ADMIN">ADMIN</option>
                        <option value="COORDINADOR">COORDINADOR</option>
                        <option value="STAFF">STAFF</option>
                    </select>
                    <br>
                    <label for=""><b>Estado:</b></label>
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
            document.getElementById('edit_id_staff').value = this.getAttribute('data-id');
            document.getElementById('edit_id_card').value = this.getAttribute('data-id_card');
            document.getElementById('edit_last_name').value = this.getAttribute('data-last_name');
            document.getElementById('edit_firs_name').value = this.getAttribute('data-firs_name');
            document.getElementById('edit_mail').value = this.getAttribute('data-mail');
            document.getElementById('edit_phone').value = this.getAttribute('data-phone');
            document.getElementById('edit_role').value = this.getAttribute('data-role');
            document.getElementById('edit_state').value = this.getAttribute('data-state');
        });
    });
</script>
