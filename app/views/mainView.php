<?php

use PitouFW\Core\Alert;
use PitouFW\Core\Request;
use function PitouFW\Core\t;
use function PitouFW\Core\webroot;

?>
<!doctype html>
<html lang="<?= t()->getAppliedLang() ?>">
	<head>
		<title><?= L::title ?></title>
        <meta name="author" content="<?= AUTHOR ?>" />
        <meta name="description" content="<?= L::desc ?>" />
		<meta charset="utf-8" />
        <?php if (Request::get()->getArg(0) === 'home'): ?>
        <link rel="canonical" href="<?= APP_URL . t()->getAppliedLang() ?>" />
        <?php endif;
        foreach (ACCEPTED_LANGUAGES as $lang):
            if (t()->getAppliedLang() !== $lang): ?>
            <link rel="alternate" hreflang="<?= $lang ?>" href="<?= APP_URL . $lang ?>" />
        <?php endif;
        endforeach; ?>

        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?= L::title ?>" />
        <meta property="og:description" content="<?= L::desc ?>" />
        <meta property="og:url" content="<?= APP_URL ?>" />
        <meta property="og:image" content="<?= APP_URL ?>assets/img/banner.png" />
        <meta property="og:site_name" content="<?= NAME ?>" />
        <meta name="twitter:card" content="summary_large_image" />

        <link type="text/css" rel="stylesheet" href="<?= CSS . 'font-awesome_v5.15.1.min.css' ?>" media="screen" />
        <link type="text/css" rel="stylesheet" href="<?= CSS . 'styles.css' ?>" media="screen" />
        <link type="text/css" rel="stylesheet" href="<?= CSS . 'custom.css' ?>" media="screen" />

		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
		<meta name="format-detection" content="telephone=no" />

        <link rel="icon" type="image/x-icon" href="<?= IMG ?>icon.png" />
	</head>

    <body>
        <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    <nav class="navbar navbar-marketing navbar-expand-lg bg-white navbar-light">
                        <div class="container">
                            <a class="navbar-brand text-dark" href="<?= webroot() ?>">
                                <img src="<?= IMG ?>logo.png" alt="<?= NAME ?>" />
                            </a>
                            <div class="nav-item dropdown lang-selector">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="selected-lang">
                                    <?= L::flag . ' ' . strtoupper(t()->getAppliedLang()) ?>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= WEBROOT ?>en<?= Request::get()->getRoute() ?>">🇬🇧 EN</a>
                                    <a class="dropdown-item" href="<?= WEBROOT ?>fr<?= Request::get()->getRoute() ?>">🇫🇷 FR</a>
                                </div>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto mr-lg-5">
                                    <li class="nav-item"><a class="nav-link" target="_blank" rel="noopener" href="https://justauth.me/<?= t()->getAppliedLang() ?>/"><?= L::nav_download ?> </a></li>
                                    <li class="nav-item"><a class="nav-link" target="_blank" rel="noopener" href="https://blog.justauth.me/"><?= L::nav_blog ?> </a></li>
                                    <li class="nav-item"><a class="nav-link" target="_blank" rel="noopener" href="https://github.com/justauthme/demo-website"><?= L::nav_github ?> </a></li>
                                </ul>
                                <a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="https://developers.justauth.me"><i class="fas fa-star mr-1"></i><?= L::nav_add ?></a>
                            </div>
                        </div>
                    </nav>
                    <?= Alert::handle() ?>
                    <?php require_once @$appView; ?></main>
            </div>
            <div id="layoutDefault_footer">
                <footer class="footer pt-10 pb-5 mt-auto bg-white footer-light">
                    <div class="container">
                        <hr class="my-5" />
                        <div class="row align-items-center">
                            <div class="col-md-6 small">Copyright &copy; JustAuthMe 2019 - <?= date('Y') ?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

		<script type="text/javascript" src="<?= JS . 'jquery.min.js' ?>"></script>
		<script type="text/javascript" src="<?= JS . 'bootstrap.min.js' ?>"></script>
		<script type="text/javascript" src="<?= JS . 'scripts.js' ?>"></script>
        <script type="text/javascript" src="https://static.justauth.me/medias/jam-button-v2.js"></script>
    </body>
</html>
