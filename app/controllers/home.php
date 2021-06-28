<?php

use PitouFW\Core\Alert;
use PitouFW\Core\Controller;
use PitouFW\Core\Data;
use PitouFW\Entity\NewsletterEmail;
use function PitouFW\Core\t;

Data::get()->add('TITLE', L::home_title);
Controller::renderView('home/home');
