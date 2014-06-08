<?php

use Highcharts\Highchart;
use Highcharts\JQueryEngine;
use Zend\Json\Expr;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

$chart = new Highchart();

$chart->set('chart.renderTo', 'container');
$chart->set('chart.type', 'bar');

$chart->set('title.text', 'Historic World Population by Region');

$chart->set('subtitle.text', 'Source: Wikipedia.org');

$chart->set('xAxis.title', null);
$chart->set(
	'xAxis.categories',
	array('Africa', 'America', 'Asia', 'Europe', 'Oceania')
);

$chart->set('yAxis.min', 0);
$chart->set('yAxis.title.text', 'Temperature (ºC)');
$chart->set('yAxis.title.align', 'high');
$chart->set('yAxis.title.labels.overflow', 'justify');

$chart->set('tooltip.valueSuffix', ' millions');

$chart->set('plotOptions.bar.dataLabels.enabled', true);

$chart->set('legend.layout', 'vertical');
$chart->set('legend.align', 'right');
$chart->set('legend.verticalAlign', 'top');
$chart->set('legend.x', -40);
$chart->set('legend.y', 100);
$chart->set('legend.floating', true);
$chart->set('legend.borderWidth', 1);
$chart->set(
	'legend.backgroundColor',
	new Expr('(Highcharts.theme && Highcharts.theme.legendBackgroundColor || "#FFFFFF")')
);
$chart->set('legend.shadow', true);

$chart->set('credits.enabled', false);

$chart->append(
	'series',
	array(
		'name' => 'Year 1800',
		'data' => array(
			107, 31, 635, 203, 2,
		)
	)
);

$chart->append(
	'series',
	array(
		'name' => 'Year 1900',
		'data' => array(
			133, 156, 947, 408, 6
		)
	)
);

$chart->append(
	'series',
	array(
		'name' => 'Year 2008',
		'data' => array(
			973, 914, 4054, 732, 34
		)
	)
);

?>

<html>
    <head>
        <title>Area range</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="http://code.highcharts.com/highcharts.js"></script>
    </head>
    <body>
        <div id="container"></div>
		<?php echo $chart->render(new JQueryEngine()); ?>
    </body>
</html>

