<?php if ($errors->any()): ?>
    <ul>
        <?php foreach($errors->all() as $error): ?>
            <li>{{ $error }}</li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>