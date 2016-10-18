<?php
/** @var modX $modx */
/** @var Office $office */
if ($Office = $modx->getService('office', 'Office', MODX_CORE_PATH . 'components/office/model/office/')) {

    if (!($Office instanceof Office)) {
        $modx->log(xPDO::LOG_LEVEL_ERROR, '[modiiko] Could not register paths for Office component!');

        return true;
    } elseif (!method_exists($Office, 'addExtension')) {
        $modx->log(xPDO::LOG_LEVEL_ERROR, '[modiiko] You need to update Office for support of 3rd party packages!');

        return true;
    }

    /**@var array $options */
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $Office->addExtension('modiiko', '[[++core_path]]components/modiiko/controllers/office/');
            $modx->log(xPDO::LOG_LEVEL_INFO, '[modiiko] Successfully registered modiiko as Office extension!');
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            $Office->removeExtension('modiiko');
            $modx->log(xPDO::LOG_LEVEL_INFO, '[modiiko] Successfully unregistered modiiko as Office extension.');
            break;
    }
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR, '[modiiko] Could not register paths for Office component!');
}

return true;