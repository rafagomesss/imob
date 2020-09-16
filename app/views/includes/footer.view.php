	</div>
	<!--Container-->
	<script src="<?= JS_PATH; ?>/jquery/jquery-3.5.1.min.js" type="text/javascript"></script>
	<script src="<?= JS_PATH; ?>/bootstrap/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= JS_PATH; ?>/global/functions.js" type="text/javascript"></script>
	<script src="<?= JS_PATH; ?>/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
	<script src="<?= ASSETS_PATH; ?>/fontawesome/js/all.min.js" type="text/javascript"></script>

	<?php if ($this->controller === 'auth') : ?>
		<?php if ($this->action === 'register') : ?>
			<script src="<?= JS_PATH; ?>/auth/register.js" type="text/javascript"></script>
		<?php endif; ?>
		<?php if ($this->action === 'login') : ?>
			<script src="<?= JS_PATH; ?>/auth/login.js" type="text/javascript"></script>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ($this->controller === 'sales') : ?>
		<script src="<?= JS_PATH; ?>/jquery/jquery.mask.min.js" type="text/javascript"></script>
		<script src="<?= JS_PATH; ?>/sales/sales.js" type="text/javascript"></script>
	<?php endif; ?>
	<?php if ($this->controller === 'products') : ?>
		<?php if ($this->action === 'edit') : ?>
			<script src="<?= JS_PATH; ?>/jquery/jquery.mask.min.js" type="text/javascript"></script>
			<script src="<?= JS_PATH; ?>/jquery/jquery.easing.min.js" type="text/javascript"></script>
			<script src="<?= JS_PATH; ?>/jquery/jquery-ui.min.js" type="text/javascript"></script>
			<script src="<?= JS_PATH; ?>/jquery/jquery.ui.datepicker-pt-BR.js" type="text/javascript"></script>
			<script src="<?= JS_PATH; ?>/products/edit.js" type="text/javascript"></script>
		<?php endif; ?>
		<?php if ($this->action === 'register') : ?>
			<script src="<?= JS_PATH; ?>/jquery/jquery.mask.min.js" type="text/javascript"></script>
			<script src="<?= JS_PATH; ?>/jquery/jquery.easing.min.js" type="text/javascript"></script>
			<script src="<?= JS_PATH; ?>/jquery/jquery-ui.min.js" type="text/javascript"></script>
			<script src="<?= JS_PATH; ?>/jquery/jquery.ui.datepicker-pt-BR.js" type="text/javascript"></script>
			<script src="<?= JS_PATH; ?>/products/register.js" type="text/javascript"></script>
		<?php endif; ?>
		<?php if ($this->action === 'list') : ?>
			<script src="<?= JS_PATH; ?>/products/list.js" type="text/javascript"></script>
		<?php endif; ?>
	<?php endif; ?>
	</body>

	</html>
