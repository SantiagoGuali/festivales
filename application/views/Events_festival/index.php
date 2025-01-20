<div class="container">
    <h3 class="text-center">Lista de Eventos</h3>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar Evento</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Evento</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($events): ?>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?php echo $event->id_event; ?></td>
                        <td><?php echo $event->eventFestival; ?></td>
                        <td><?php echo $event->hour_start; ?></td>
                        <td><?php echo $event->hour_end; ?></td>
                        <td>
                            <!-- Botón para abrir el modal de editar -->
                            <button class="btn btn-warning btnEditar" data-bs-toggle="modal" data-bs-target="#modalEditar"
                                data-id="<?php echo $event->id_event; ?>"
                                data-eventFestival="<?php echo $event->eventFestival; ?>"
                                data-hour_start="<?php echo $event->hour_start; ?>"
                                data-hour_end="<?php echo $event->hour_end; ?>">
                                Editar
                            </button>
                            <a href="<?php echo site_url('Events_festival/eliminar/' . $event->id_event); ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">No hay eventos registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal para Registrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('Events_festival/guardar'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistrarLabel">Registrar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="eventFestival">Evento:</label>
                    <textarea name="eventFestival" class="form-control" placeholder="Descripción del evento" required></textarea>
                    <label for="hour_start" class="mt-3">Hora de Inicio:</label>
                    <input type="time" name="hour_start" class="form-control" required>
                    <label for="hour_end" class="mt-3">Hora de Fin:</label>
                    <input type="time" name="hour_end" class="form-control" required>
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
            <form action="<?php echo site_url('Events_festival/guardarCambios'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Campo oculto para el ID del evento -->
                    <input type="hidden" name="id_event" id="edit_id_event">
                    
                    <label for="edit_eventFestival">Evento:</label>
                    <textarea name="eventFestival" id="edit_eventFestival" class="form-control" placeholder="Descripción del evento" required></textarea>
                    <label for="edit_hour_start" class="mt-3">Hora de Inicio:</label>
                    <input type="time" name="hour_start" id="edit_hour_start" class="form-control" required>
                    <label for="edit_hour_end" class="mt-3">Hora de Fin:</label>
                    <input type="time" name="hour_end" id="edit_hour_end" class="form-control" required>
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
            document.getElementById('edit_id_event').value = this.getAttribute('data-id');
            document.getElementById('edit_eventFestival').value = this.getAttribute('data-eventFestival');
            document.getElementById('edit_hour_start').value = this.getAttribute('data-hour_start');
            document.getElementById('edit_hour_end').value = this.getAttribute('data-hour_end');
        });
    });
</script>
