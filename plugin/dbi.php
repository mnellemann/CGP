<?php

# Collectd dbi plugin

require_once 'conf/common.inc.php';
require_once 'type/Default.class.php';
require_once 'inc/collectd.inc.php';



$obj = new Type_Default($CONFIG, $_GET);


$obj->rrd_title = sprintf('%s', $obj->args['pinstance'], $obj->args['type']);
$obj->rrd_format = '%5.1lf%s';

collectd_flush($obj->identifiers);
$obj->rrd_graph();
