Highcharts
==============

[![Build Status](https://travis-ci.org/yriveiro/php-highcharts.svg?branch=master)](https://travis-ci.org/yriveiro/php-highcharts)
[![Coverage Status](https://img.shields.io/coveralls/yriveiro/php-highcharts.svg)](https://coveralls.io/r/yriveiro/php-highcharts?branch=master)

PHP wrapper for the awesome JavaScript library [Highcharts](http://www.highcharts.com/)


Install
--------------

* Composer:

```json
	"require": {
		"yriveiro/php-highcharts": "0.1.*"
	}
```

Usage
-----

```php
use Highcharts\Highchart;
use Highcharts\JQueryEngine;

$chart = new Highchart();

$chart->set('chart.renderTo', 'container');
$chart->set('title.text', 'Monthly Average Temperature');
$chart->set('title.x', -20);

$chart->set('subtitle.text', 'Source: WorldClimate.com');
$chart->set('subtitle.x', -20);

$chart->set(
	'xAxis.categories',
	array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')
);
$chart->set('yAxis.title.text', 'Temperature (ºC)');
$chart->append(
	'yAxis.plotLines',
	array(
		'value' => 0,
		'width' => 1,
		'color' => '#808080'
	)
);

$chart->set('tooltip.valueSuffix', 'ºC');

$chart->set('legend.layout', 'vertical');
$chart->set('legend.align', 'right');
$chart->set('legend.verticalAlign', 'middle');
$chart->set('legend.borderWidth', 0);

$chart->append(
	'series',
	array(
		'name' => 'Tokyo',
		'data' => array(
			7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6,
		)
	)
);

$chart->append(
	'series',
	array(
		'name' => 'New York',
		'data' => array(
			-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5
		)
	)
);

$chart->append(
	'series',
	array(
		'name' => 'Berlin',
		'data' => array(
			-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0
		)
	)
);

$chart->append(
	'series',
	array(
		'name' => 'London',
		'data' => array(
			3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8
		)
	)
);

$chart->render(new JQueryEngine());
````

TODO
----

Improve documentation.
