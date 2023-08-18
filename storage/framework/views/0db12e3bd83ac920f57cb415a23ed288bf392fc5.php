<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<h3>Hello <?php echo e($name); ?>,<br>Username:<?php echo e($username); ?><br>Password:<?php echo e($password); ?></h3>
<?php if($child_name && $child_grnumber && $child_password): ?>
    <h3>
        Child:<?php echo e($child_name); ?>

        <br>
        Login Credentials
        <br>
        GR Number : <?php echo e($child_grnumber); ?>

        <br>
        Password:<?php echo e($child_password); ?>

    </h3>
<?php endif; ?>
</body>
</html>
<?php /**PATH D:\php\eschool\resources\views/students/email.blade.php ENDPATH**/ ?>