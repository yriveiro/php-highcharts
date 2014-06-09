<?php
namespace Highcharts;


use Highcharts\AbstractEngine;


/**
 * Creates an Engine Object to render the Highchart object.
 */
class JQueryEngine extends AbstractEngine
{
	/**
	 * Create an Engine object.
	 */
	public function __construct()
	{
		// Nothing to do here.
	}

	/**
	 * Render chart's JavaScript code.
	 *
	 * @return string Generated JavaScript code.
	 */
	public function renderJavaScript() {
		$js = '$(function() {';
		$js .= sprintf('var chart = new Highcharts.Chart(%s);', $this->options);
		$js .= '});';

		return $js;
	}
}
