# Log Email Configuration
	
Copy log-email/config/log-email.php to application/config/log-email.php and configure the necessary items.

	return array(
		'to' => array(
			'merrick.christensen@corda.com'
			),
		'from' => 'donotreply@corda.com',
		'project' => 'Kohana Sandbox',
		'subject' => ':project requires your attention.'
	);

## Keys

###to 
Array of emails to send the log messages to.

### from
Email to send the messages from.

### project
Project name this will be placed in the subject where the string :project appears.

### subject
The subject of the log email.