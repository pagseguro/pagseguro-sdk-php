<?php

require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

try {
    if (\PagSeguro\Helpers\Xhr::hasPost()) {
        $response = \PagSeguro\Services\Application\Notification::check(
            \PagSeguro\Configuration\Configure::getApplicationCredentials()
        );
    } else {
        throw new \InvalidArgumentException($_POST);
    }

    echo "<pre>";
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}
