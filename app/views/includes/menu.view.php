<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <?php if (!\System\Session::has('USER')) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= SITE_URL; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
            <?php endif; ?>
            <?php if (\System\Session::has('USER') && (int) \System\Session::get('ACCESS_LEVEL') === 1) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= SITE_URL; ?>/sales">Vendas</a>
                </li>
            <?php endif; ?>
        </ul>
        <span class="text-info mr-3 text-uppercase font-weight-bold">Olá <?= \System\Session::get('USER'); ?></span>
    </div>
</nav>
