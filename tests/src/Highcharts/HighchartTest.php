<?php
namespace tests\src\Highcharts;


use Exception;
use ReflectionClass;
use Highcharts\Highchart;
use Highcharts\JQueryEngine;
use Dflydev\DotAccessData\Data;
use PHPUnit_Framework_TestCase;


class HighchartTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->chart = new Highchart();
	}
	public function testCreateHighchart()
	{
		$this->assertInstanceOf('Highcharts\AbstractHighchart', $this->chart);
		$this->assertInstanceOf('Highcharts\Highchart', $this->chart);
	}

	public function testHighchartHasContainerDefined()
	{
		$this->assertObjectHasAttribute(
			'container',
			$this->chart,
			'Hihgchart class must have defined container property.'
		);
	}

	public function testSetPropertyInHighchartSection()
	{
		$this->chart->set('chart.renderTo', 'divContainer');

		$this->assertEquals('divContainer', $this->chart->get('chart.renderTo'));
	}

	public function testBuildHighchart()
	{
		$this->chart->set('chart.renderTo', 'divContainer');

		$this->assertEquals(
			'{"chart":{"renderTo":"divContainer"}}',
			$this->chart->build()
		);
	}

	public function testRenderHighchartWithJQueryEngine()
	{
		$this->chart->set('chart.renderTo', 'divContainer');

		$this->assertEquals(
			'<script>$(function() {var chart = new Highcharts.Chart({"chart":{"renderTo":"divContainer"}});});</script>',
			$this->chart->render(new JQueryEngine())
		);
	}

}