<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var modiiko $modiiko */
$modiiko = $modx->getService('modiiko', 'modiiko', $modx->getOption('modiiko_core_path', null,
        $modx->getOption('core_path') . 'components/modiiko/') . 'model/modiiko/');
$modx->lexicon->load('modiiko:default');

// handle request
$corePath = $modx->getOption('modiiko_core_path', null, $modx->getOption('core_path') . 'components/modiiko/');
$path = $modx->getOption('processorsPath', $modiiko->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location'        => '',
));