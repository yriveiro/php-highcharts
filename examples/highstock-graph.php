<?php

use Highcharts\Highchart;
use Highcharts\JQueryEngine;
use Zend\Json\Expr;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

$chart = new Highchart();

$chart->set('chart.renderTo', 'container');
$chart->set('rangeSelector.selected', 1);
$chart->set('rangeSelector.inputEnabled', new Expr("$('#container').width() > 480"));
$chart->set('title.text', 'AAPL Stock Price');
$chart->append(
	'series',
	array(
		'name' => 'AAPL',
		'data' => json_decode(file_get_contents(dirname(__FILE__) . '/highstock.json')),
		'tooltip' => array('valueDecimal' => 2)
	)
);

?>

<html>
    <head>
        <title>Area range</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="http://code.highcharts.com/stock/highstock.js"></script>
    </head>
    <body>
        <div id="container"></div>
		<?php echo $chart->render(new JQueryEngine(JQueryEngine::HIGHSTOCK)); ?>
    </body>
</html>
