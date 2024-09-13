<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome Ya : <?php echo e($name); ?></h1>
    <h4>
        this is your favourite colors : 
        <ul>
            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($color); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </h4>
</body>
</html><?php /**PATH D:\cs\courses\my projects\xampp\htdocs\backend2024\mvc\session14\src\views/home.blade.php ENDPATH**/ ?>