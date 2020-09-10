<?php if (System\Session::has('success')) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <?= System\Session::get('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (System\Session::has('warning')) : ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <?= System\Session::get('warning'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (System\Session::has('info')) : ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <?= System\Session::get('info'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (System\Session::has('danger')) : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <?= System\Session::get('danger'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
