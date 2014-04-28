mzFlash
=======

A PHP Flash Message Class

Installation Instructions for Anax-MVC
======================================

Register it as an Anax Service like this in your config/frontcontroller or whatever method you prefer.

	$di = new \Anax\DI\CDIFactoryDefault();

	// Other Services

	$di->setShared('flash', function() {
		$flash = new \nuvalis\Flash\Message();
		return $flash;
	});

	// Other Services, Controllers etc.

	$app = new \Anax\Kernel\CAnax($di);

	$app->session //Start Session for mzFlash to work.


You should now be able to use these functions like this.

	$app->flash->error("Your Message");
	$app->flash->success("Your Message");
	$app->flash->warning("Your Message");
	$app->flash->message("Your Message");

	//To print it out you can use it like this in your theme/mytheme/index.tpl.php

	<?= $this->flash->show(); ?>

