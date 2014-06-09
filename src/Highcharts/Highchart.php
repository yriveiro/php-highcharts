<?php
namespace Highcharts;


use Highcharts\AbstractHighchart;
use Highcharts\AbstractEngine;

/**
 * Creates Highcharts JavaScript code.
 */
class Highchart extends AbstractHighchart
{
	/**
	 * Create a new Highcharts graph.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Renders the JavaScript code to add to HTML.
	 *
	 * @param Highcharts\AbstractEngine $engine Engine to be used for rendering.
	 * @param boolean $scriptTags Define if script HTML tags should be rendering.
	 *
	 * @return string Chart's JavaScript code.
	 */
	public function render(AbstractEngine $engine, $scriptTags = true)
	{
		return $engine->render($this->build(), $scriptTags);
	}
}