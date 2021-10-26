<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('backend.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
            <?php echo $__env->make('backend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('backend.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent("main_content"); ?>
            <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php echo $__env->make('backend.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>

<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/backend/layout.blade.php ENDPATH**/ ?>