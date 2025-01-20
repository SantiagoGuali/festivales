<br>
<div class="container">
    <div class="row">
        <!-- Formulario para registrar staff -->
        <div class="col-md-4">
            <h3 class="text-center">REGISTRAR STAFF</h3>
            <form action="<?php echo site_url('Staff/guardar'); ?>" id="frm_registrar_staff" method="post">
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
                <br>
                <button class="btn btn-success" type="submit">Guardar</button>
                &nbsp;
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </form>
        </div>

        <!-- Listado de staff -->
        <div class="col-md-8">
            <h3 class="text-center">LISTADO DE STAFF</h3>
            <br>
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
                                    <a href="#" class="btn btn-warning">Editar</a>
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
<br><br>
