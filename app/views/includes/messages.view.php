<div class="row justify-content-center">
    <div class="col-6">
        <?php if (System\Session::has('success')) : ?>
            <div class="alert alert-success alert-dismissible text-center" role="alert">
                <?= System\Flash::get('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if (System\Session::has('warning')) : ?>
            <div class="alert alert-warning alert-dismissible text-center" role="alert">
                <?= System\Flash::get('warning'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if (System\Session::has('info')) : ?>
            <div class="alert alert-info alert-dismissible text-center" role="alert">
                <?= System\Flash::get('info'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if (System\Session::has('danger')) : ?>
            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                <?= System\Flash::get('danger'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>
