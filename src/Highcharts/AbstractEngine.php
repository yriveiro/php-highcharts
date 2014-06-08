<?php
namespace Highcharts;


abstract class AbstractEngine
{
	protected $options;

	abstract public function renderJavaScript();

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