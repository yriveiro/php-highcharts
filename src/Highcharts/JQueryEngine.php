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
	public function __construct($chartType = self::HIGHCHART)
	{
		$this->isHighstock = ($chartType === self::HIGHSTOCK);
	}

	/**
	 * Render chart's JavaScript code.
	 *
	 * @return string Generated JavaScript code.
	 */
	public function renderJavaScript() {
		$js = '$(function() {';
		$js .= sprintf(
			'var chart = new Highcharts.%s(%s);',
			($this->isHighstock) ? "StockChart" : 'Chart',
			$this->options
		);
		$js .= '});';

		return $js;
	}
}
