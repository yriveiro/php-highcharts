<?php
namespace Highcharts;


use Highcharts\AbstractEngine;


class JQueryEngine extends AbstractEngine
{
	public function __construct()
	{
		// Nothing to do here.
	}

	public function renderJavaScript() {
		$html = '$(function() {';
		$html .= sprintf('var chart = new Highcharts.Chart(%s);', $this->options);
		$html .= '});';

		return $html;
	}
}