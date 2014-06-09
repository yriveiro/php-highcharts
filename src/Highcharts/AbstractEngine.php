<?php
namespace Highcharts;


use Dflydev\DotAccessData\Data;


/**
 * Abstract class to define what is an engine.
 */
abstract class AbstractEngine
{
	/**
	 * @var Options container.
	 */
	protected $options;

	/**
	 * @abstract Render chart's JavaScript code.
	 */
	abstract public function renderJavaScript();

	/**
	 * @param string $highchartOptions Options container.
	 * @param boolean $scriptTags Define if script HTML tags should be rendering.
	 *
	 * @return string Chart's JavaScript code.
	 */
	public function render($highchartOptions, $scriptTags = true)
	{
		$this->options = $highchartOptions;

		$html = $this->renderJavaScript();

		if ($scriptTags) {
			$html = sprintf('<script>%s</script>', $html);
		}

		return $html;
	}
}
