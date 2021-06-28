<?php

use PitouFW\Core\Controller;
use PitouFW\Core\Data;
use PitouFW\Core\Utils;

if (Utils::isInternalCall()) {
    Data::get()->add('secret', 'tartanpion');
    Controller::renderApiSuccess();
}

if(ENV_NAME === "prod"){
    Controller::http404NotFound();
    Data::get()->add('name', NAME);
    Data::get()->add('version', ['ref' => DEPLOYED_REF, 'hash' => substr(DEPLOYED_COMMIT, 0, 5)]);
    Controller::renderApiSuccess();
}

Data::get()->add('name', NAME);
Data::get()->add('version', ['ref' => DEPLOYED_REF, 'hash' => DEPLOYED_COMMIT]);
Controller::renderApiSuccess();
