# Log Email

## Enable

To enable Log Email attach the new writer in your bootstrap.php file after the modules section of the bootstrap, otherwise it will get called before Log Email is included.

	Kohana::$log->attach(new Log_Email, Log::ERROR);
	
The second parameter _Log::ERROR_ in this example would be the lowest level of importance and above that you want to listen to. 


[!!] Remember to keep this reasonable you don't want to spam yourself with log messages. Kohana Exceptions are at the Log::ERROR level.

This module will typically be used in a production environment, like so:

	if (Kohana::$environment === Kohana::PRODUCTION) 
	{
		Kohana::$log->attach(new Log_Email, Log::ERROR);
	}

## Available Options For Logs

1. Log::EMERGENCY
2. Log::ALERT
3. Log::CRITICAL
4. Log::ERROR
5. Log::WARNING
6. Log::NOTICE
7. Log::INFO
8. Log::DEBUG