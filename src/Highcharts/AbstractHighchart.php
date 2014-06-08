<?php
namespace Highcharts;


use Highcharts\AbstractEngine;
use Dflydev\DotAccessData\Data;
use Zend\Json\Json;


abstract class AbstractHighchart
{
    protected $container;

	public function __construct()
	{
		$this->container = new Data();
	}

	abstract public function render(AbstractEngine $engine);

	public function set($key, $value)
	{
		$this->container->set($key, $value);

		return $this;
	}

	public function get($key)
	{
		return $this->container->get($key);
	}

	public function build()
	{
		return Json::encode(
			$this->container->export(),
			false,
			array('enableJsonExprFinder' => true)
		);
	}
}
