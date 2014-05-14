mzFlash
=======
[![Build Status](https://travis-ci.org/nuvalis/mzFlash.svg?branch=master)](https://travis-ci.org/nuvalis/mzFlash)

A PHP Flash Message Class

Installation Instructions for Anax-MVC
======================================

Register it as an Anax Service like this in your config/frontcontroller or whatever method you prefer.

	$di = new \Anax\DI\CDIFactoryDefault();

	// Other Services

	$di->setShared('mzflash', function() {
		$mzflash = new \nuvalis\Flash\Message();
		return $mzflash;
	});

	// Other Services, Controllers etc.

	$app = new \Anax\Kernel\CAnax($di);

	$app->session //Start Session for mzFlash to work.


You should now be able to use these functions like this.

	// In the Frontcontroller you can do it like this.

	$app->mzflash->error("Your Message");
	$app->mzflash->success("Your Message");
	$app->mzflash->warning("Your Message");
	$app->mzflash->message("Your Message");
	
	// If you are in a Controller or Model (Notice the diffrence $app/$this)
	
	$this->mzflash->error("Your Message");
	$this->mzflash->success("Your Message");
	$this->mzflash->warning("Your Message");
	$this->mzflash->message("Your Message");

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

Update
=================
[14 May, 2014]
Changed variable from flash to mzflash to avoid collision with Anax-MVC's new flash class/service. You can name this service to anything you want.
