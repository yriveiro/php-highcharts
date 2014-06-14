Highcharts
==============

[![Build Status](https://travis-ci.org/yriveiro/php-highcharts.svg?branch=master)](https://travis-ci.org/yriveiro/php-highcharts)
[![Coverage Status](https://img.shields.io/coveralls/yriveiro/php-highcharts.svg)](https://coveralls.io/r/yriveiro/php-highcharts?branch=master)

PHP wrapper for the awesome JavaScript library [Highcharts](http://www.highcharts.com/)


Not ready for production yet.

Install
--------------

The simplest way to install this library is through the dependency manager [`Composer`](http://getcomposer.org). Create a ``composer.json`` and add the following configuration.

```json
"require": {
	"yriveiro/php-highcharts": "0.1.0"
}
```

After just run the command ``php composer.phar install`` to installed it as a part of your project.


Components
----------

This library is composed by two main pieces, a __main__ class ``Highchart`` responsible to build the chart and a __render engine__ class ``XEngine`` responsible of the rendering the JavaScript code.

In this version the default (and only) render engine it's the ``JQueryEngine`` but is very easy create a new engine.

To create a new engine class, this must extend the [`AbstractEngine`](https://github.com/yriveiro/php-highcharts/blob/master/src/Highcharts/AbstractEngine.php) class and implements the method ``AbstractEngine::renderJavaScript()``.


Usage
-----

Use this library it's very simple. You can create a Highchart or a Highstock using the Highchart constructor.

```php
use Highcharts\Highchart;
use Highcharts\JQueryEngine;

$chart = new Highchart();
```

### Set

After this the ``$chart`` variable is all you need to start the configuration of the chart.

```php
$chart->set('chart.renderTo', 'container');
$chart->set('title.text', 'Monthly Average Temperature');
$chart->set('title.x', -20);
```

The ``set`` method uses a key and a value to set the properties to the ``$chart`` object. As you can see the way to define the ``$key`` is using dot notation.

```php
$chart->set('subtitle.text', 'Source: WorldClimate.com');
$chart->set('subtitle.x', -20);
```

To set an array of values to the xAxis.categories properties:

```php
$chart->set(
	'xAxis.categories',
	array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')
);
```

### Append

There is some properties of the Highchart that accept arrays, to define this properties the method to be used will be ``append`` instead ``set``. In the case that the property doesn't have any previous value will be created with the appended value.

```php
$chart->append(
	'yAxis.plotLines',
	array(
		'value' => 0,
		'width' => 1,
		'color' => '#808080'
	)
);
```

The same process it's applied to the series property.

```php
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
```

### JavaScript Expressions

Also exists the possibility that some properties uses an javascript expression as value, to render this expressions corretly they should be create using the Expr class from the class `Zend\Json\Expr`.

```php
$chart->set(
	'legend.backgroundColor',
	new Expr('(Highcharts.theme && Highcharts.theme.legendBackgroundColor || "#FFFFFF")')
);
```

### Render

To render the chart the last thing to do is call the render method of the ``$chart`` object with an engine as the first parameter, optionally you can pass a second parameter that will add the ``<script></script>`` tags to the result, by default it's set to true.

```php
$chart->render(new JQueryEngine());
````

By default the ``JQueryEngine`` renders a Highchart chart, if you want render a Highstock chart the way to do passing to the ``JQueryEngine`` the constant ``JQueryEngine::HIGHSTOCK``.

```php
$chart->render(new JQueryEngine(JQueryEngine::HIGHSTOCK))
```

Examples
----

There is a set of expamples into the ``example`` folder.
