<?php

/**
 * Use composer require mailchimp/transactional to execute this class
 * 
 * @author Harol Restrepo			
 * @filesource https://mailchimp.com/developer/transactional/guides/send-first-email/#send-your-first-email 
 * 
 * 
 */

require_once('vendor/autoload.php');

class MandrillMail
{

	//NOTE: replace this values by your CONSTANTS file for more security

	private $public_key = 'YOUR_API_KEY';
	private $from_name  = 'NAME_HERE';
	private $from_email = 'noreply@domain.com';
	private $template	= '';
	private $campaing   = '';
	private	$mailchimp  = NULL;

	/**
	 * 
	 * Initialize the Mandrill API with the public key
	 * 
	 */

	public function __construct()
	{
		$this->mailchimp = new MailchimpTransactional\ApiClient();
		$this->mailchimp->setApiKey($this->public_key);
	}

	public function set_template($template='')
	{
		$template != '' ? $this->template = $template : '';
	}

	/**
	 * Test if is working
	 * @return String : PONG!, in success case
	 */

	public function ping(){
	 try {
	    $response = $this->mailchimp->users->ping();
	    print_r($response);
	  } catch (Error $e) {
	        echo 'Error: ',  $e->getMessage(), "\n";
	  }
	}

	/**
	 * Send the email via HTML OR TEXT
	 * @param $subject String Subject email
	 * @param $message String Message for the email, cna be html or text
	 * @param $to String|Array email or list of emails
	 * 
	 * @return $response JSON Responds if the the main can be send
	 */

	public function send_html($subject='', $message='', $to='')
	{
		//If is only one use a simple string or an array[0]
		if(is_array($to))
		{
			$arr_to = [];

			foreach ($to as $email) {
				$arr_to[] = [
				            "email" => $email,
				            "type" => "to"
				          ];
			}

		}
		else
		{
			$arr_to = [
				[
				 'email'=> $to,
				 'type' => 'to'
				]
			];
		}

		if($subject != '' && $message != '' && count($arr_to) > 0)
		{
			$message = [
					'from_email' => $this->from_email,
					 'from_name' => $this->from_name,
 					   "subject" => $subject,
					      "html" => $message,
							 "to"=> $arr_to
					];

		    try {
	        	$response = $this->mailchimp->messages->send(["message" => $message]);
		        print_r($response);
		    } catch (Error $e) {
		        echo 'Error: ', $e->getMessage(), "\n";
		    }
		}
	}

}
