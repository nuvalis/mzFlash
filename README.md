mzFlash
=======

A PHP Flash Message Class

Installation Instructions for Anax-MVC
======================================

Register it as an Anax Service like this in your config/frontcontroller or whatever method you prefer.

	$di = new \Anax\DI\CDIFactoryDefault();

	// Other Services

	$di->setShared('flash', function() {
		$flash = new nuvalis\Flash\Message();
		return $flash;
	});

	// Other Services, Controllers etc.

	$app = new \Anax\Kernel\CAnax($di);

	$app->session //Start Session for mzFlash to work.

