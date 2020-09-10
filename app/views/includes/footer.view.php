	</div>
	<!--Container-->
	<script src="<?= JS_PATH; ?>/jquery/jquery-3.5.1.min.js" type="text/javascript"></script>
	<script src="<?= JS_PATH; ?>/bootstrap/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= JS_PATH; ?>/global/functions.js" type="text/javascript"></script>
	<script src="<?= JS_PATH; ?>/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
	<?php if ($this->controller === 'home') : ?>
		<script src="<?= JS_PATH; ?>/auth/login.js" type="text/javascript"></script>
	<?php endif; ?>
	<?php if ($this->controller === 'auth') : ?>
		<script src="<?= JS_PATH; ?>/auth/register.js" type="text/javascript"></script>
	<?php endif; ?>
	</body>

	</html>
