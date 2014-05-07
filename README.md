mzFlash
=======
[![Build Status](https://travis-ci.org/nuvalis/mzFlash.svg?branch=master)](https://travis-ci.org/nuvalis/mzFlash)

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

	// In the Frontcontroller you can do it like this.

	$app->flash->error("Your Message");
	$app->flash->success("Your Message");
	$app->flash->warning("Your Message");
	$app->flash->message("Your Message");
	
	// If you are in a Controller or Model (Notice the diffrence $app/$this)
	
	$this->flash->error("Your Message");
	$this->flash->success("Your Message");
	$this->flash->warning("Your Message");
	$this->flash->message("Your Message");

	//To print it out you can use it like this in your Anax-MVC/theme/mytheme/index.tpl.php

	<?= $this->flash->show(); ?>

	// The Output will look something like this

	<section class="flash-messages">
		<div class="inner">
			<div class="flash error">Your Message</div>
			<div class="flash success">Your Message</div>
			<div class="flash warning">Your Message</div>
			<div class="flash message">Your Message</div>
		</div>
	</section>

