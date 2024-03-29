<?php

namespace xecon\entity;

use xecon\Main;

class Service{
	use Entity;
	public function __construct(Main $main){
		$this->initializeXEconEntity($this->getFolderByName($this->getName()), $main);
	}
	public function sendMessage($msg, $level = \LogLevel::INFO){
		$this->main->getLogger()->log($level, $msg);
	}
	public function initDefaultAccounts(){
		$this->addAccount("Operators", (int) ceil(PHP_INT_MAX / 2), PHP_INT_MAX, 0, false);
		$this->addAccount("BankLoanSource", (int) ceil(PHP_INT_MAX), PHP_INT_MAX, 0, false);
	}
	public function registerService($name){
		$this->addAccount($name, (int) ceil(PHP_INT_MAX / 2));
	}
	public function getService($name){
		return $this->getAccount($name);
	}
	public function getName(){
		return "Services";
	}
	public function getAbsolutePrefix(){
		return "Server";
	}
}
