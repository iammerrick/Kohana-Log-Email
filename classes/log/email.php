<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Log Email is a Log Writer that sends log messages and user information using email.
 *
 * @package Log Email
 * @author Merrick Christensen
 */
class Log_Email extends Log_Writer
{
	/**
	 * Generates the email message and calls send()
	 *
	 * @param array $messages 
	 * @return void
	 * @author Merrick Christensen
	 */
	public function write(array $messages)
	{
		$email = '<h1>Log Report</h1>';
		
		$email .= $this->request_information_block();
		
		foreach($messages as $message)
		{
			foreach($message as $title => $body)
			{	
				if($title === 'level')
				{
					$body = $this->_log_levels[$body];
				}
				
				$email .= '<h2>'.ucfirst($title).'</h2><p>'.$body.'</p>';
			}
			
			$email .= '<br />';
		}
		
		$this->send($email);
	}
	
	/**
	 * Gathers information about the request and returns it in HTML format.
	 *
	 * @return string $block Request information about the user.
	 * @author Merrick Christensen
	 */
	private function request_information_block()
	{
		$request = Request::initial();
		$block = '<h2>Request Information</h2>';
		$block .= '<strong>IP Address: </strong> '. $request::$client_ip.'<br />';
		$block .= '<strong>User Agent: </strong> '. $request::$user_agent.'<br />';
		$block .= '<strong>URI: </strong>'. $request->uri().'<br />';
		
		return $block; 
	}
	
	/**
	 * Send email messages based on information found in the configuration file.
	 *
	 * @param string $content 
	 * @return void
	 * @author Merrick Christensen
	 */
	private function send($content)
	{
		$subject = str_replace(':project', Kohana::config('log-email.project'), Kohana::config('log-email.subject'));
		$from = Kohana::config('log-email.from');
		$to_emails = Kohana::config('log-email.to');

		foreach($to_emails as $email)
		{
			Email::send($email, $from, $subject, $content, TRUE);
		}
	}
}