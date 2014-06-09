<?php
namespace Highcharts;


use Highcharts\AbstractEngine;
use Dflydev\DotAccessData\Data;
use Zend\Json\Json;


/**
 * Abstract class to define what a Highchart is.
 */
abstract class AbstractHighchart
{
	/**
	 * @var Options container.
	 */
	protected $container;

	/**
	 * Initializes the chart's container.
	 */
	public function __construct()
	{
		$this->container = new Data();
	}

	/**
	 * Renders the JavaScript code to add to HTML.
	 *
	 * @abstract
	 *
	 * @param Highcharts\AbstractEngine $engine Engine to be used for rendering.
	 * @param boolean $scriptTags Define if script HTML tags should be rendering.
	 *
	 * @return string Chart's JavaScript code.
	 */
	abstract public function render(AbstractEngine $engine, $scriptTags = true);

	/**
	 * Set a chart option.
	 *
	 * @param string $key The path for the option ex: "chart.renderTo".
	 * @param mixed $value The value to set.
	 *
	 * @return self
	 */
	public function set($key, $value)
	{
		$this->container->set($key, $value);

		return $this;
	}

	/**
	 * Append data to an option.
	 *
	 * @param string $key The path for the option ex: "chart.renderTo".
	 * @param mixed $value The value to set.
	 *
	 * @return self
	 */
	public function append($key, $value)
	{
		$this->container->append($key, $value);

		return $this;
	}

	/**
	 * Get data from an option.
	 *
	 * @param string $key The path for the option ex: "chart.renderTo".
	 *
	 * @return self
	 */
	public function get($key)
	{
		return $this->container->get($key);
	}

	/**
	 * Encode chart's options to a JSON object.
	 *
	 * @return string
	 */
	public function build()
	{
		return Json::encode(
			$this->container->export(),
			false,
			array('enableJsonExprFinder' => true)
		);
	}
}
