<?php

//----------------
//EMAIL CLASS
//Contains functionality to create and send e-mails
//----------------

class email {
	
	//----------------
	//PROPERTIES
	//----------------
	
	private $sender;
	
	private $recipient;
	
	private $subject;
	
	private $body;
	
	//----------------
	//METHODS
	//----------------
	
	//* SEND FUNCTION
	//* Sends an email
	//-------------------------
	public function send($recipient, $subject, $body){
		//RETURN BOOLEAN
		return mail($recipient, $subject, $body);
	}
	
	//* SET SENDER FUNCTION
	//* Sets the 'sender' value of an e-mail
	//-------------------------
	public function setSender($sender){
		$this->sender = $sender;
	}
	
	//* GET SENDER FUNCTION
	//* Returns the 'sender' value of an e-mail
	//-------------------------
	public function getSender(){
		return $this->sender;
	}
	
	//* SET RECIPIENT FUNCTION
	//* Sets the 'to' value of an e-mail
	//-------------------------
	public function setRecipient($recipient){
		$this->recipient = $recipient;
	}
	
	//* GET RECIPENT FUNCTION
	//* Returns the 'recipient' value of an e-mail
	//-------------------------
	public function getRecipient(){
		return $this->recipient;
	}
	
	//* SET SUBJECT FUNCTION
	//* Sets the subject of an email
	//------------------------------------
	public function setSubject($subject){
		$this->subject = $subject;
	}
	
	//* GET SUBJECT FUNCTION
	//* Returns the subject of an email
	//-----------------------------------
	public function getSubject(){
		return $this->subject;
	}
	
	//* SET BODY FUNCTION
	//* Sets the body of an e-mail
	//-------------------------
	public function setBody($body){
		$this->body = $body;
	}
	
	//* GET BODY FUNCTION
	//* Returns the body of an e-mail
	//-------------------------
	public function getBody(){
		return $this->body;
	}
	
}