<?php
namespace Highcharts;


use Highcharts\AbstractHighchart;
use Highcharts\AbstractEngine;

class Highchart extends AbstractHighchart
{
	public function __construct()
	{
		parent::__construct();
	}

	public function render(AbstractEngine $engine)
	{
		return $engine->render($this->build());
	}
}