# Installation 

This module is dependent on [Kohana Email](https://github.com/banks/kohana-email), once the [Kohana Email](https://github.com/banks/kohana-email) module is installed place the log-email folder in your modules directory and enable it in bootstrap.php.
	
	Kohana::modules(array(
		'kohana-email' => MODPATH.'kohana-email',
		'log-email'  => MODPATH.'log-email',
		// Other Modules
	));
	
[!!] If possible I prefer to keep modules in alphabetical order. This is not always possible as modules may have dependancies.