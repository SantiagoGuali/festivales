</div>
<div class="content">
    <div class="row" style="background-color: #979797;">
        <div class="col-md-6">
            <center><footer style="color: white">Developed by Gary Jami and Santiago Gualichico</footer></center>
        </div>
        <div class="col-md-6">
            <center><footer style="color: white">&copy Universidad Tecnica de Cotopaxi</footer></center>
        </div>
    </div>
</div>

<?php if (isset($messages)): ?>
    <script>
        Swal.fire({
            title: "Confirmation",
            text: "<?= $messages; ?>",
            icon: "success"
        });
    </script>
<?php endif; ?>
</body>
</html>

