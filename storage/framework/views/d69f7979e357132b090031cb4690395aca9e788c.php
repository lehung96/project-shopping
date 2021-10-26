<?php if($menuParent->MenusChildrent->count()): ?>
    <ul class="hb-dropdown">
        <?php $__currentLoopData = $menuParent->MenusChildrent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="sub-dropdown-holder"><a href="blog-left-sidebar.html"><?php echo e($menuChild->name); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/fronted/child_menu.blade.php ENDPATH**/ ?>