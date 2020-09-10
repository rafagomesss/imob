<?php if (Imob\System\Session::has('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?=(Imob\System\Session::get('msg');?>
    </div>
<?php endif; ?>
<?php if (Imob\System\Session::has('warning')) : ?>
    <div class="alert alert-warning" role="alert">
        <?=(Imob\System\Session::get('msg');?>
    </div>
<?php endif; ?>
<?php if (Imob\System\Session::has('info')) : ?>
    <div class="alert alert-info" role="alert">
        <?=(Imob\System\Session::get('msg');?>
    </div>
<?php endif; ?>
<?php if (Imob\System\Session::has('danger')) : ?>
    <div class="alert alert-danger" role="alert">
        <?=(Imob\System\Session::get('msg');?>
    </div>
<?php endif; ?>

