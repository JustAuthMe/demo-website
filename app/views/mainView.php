<?php

use PitouFW\Core\Alert;
use PitouFW\Core\Request;
use function PitouFW\Core\t;

?>
<!doctype html>
<html lang="<?= t()->getAppliedLang() ?>">
	<head>
		<title><?= $TITLE ?? TITLE ?></title>
        <meta name="author" content="<?= AUTHOR ?>" />
        <meta name="description" content="<?= $DESC ?? DESC ?>" />
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
        <meta property="og:title" content="<?= $TITLE ?? TITLE ?>" />
        <meta property="og:description" content="<?= $DESC ?? DESC ?>" />
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
                            <a class="navbar-brand text-dark" href="index.html">
                                <img src="<?= IMG ?>logo.png" alt="<?= NAME ?>" />
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto mr-lg-5">
                                    <li class="nav-item"><a class="nav-link" href="https://justauth.me/<?= t()->getAppliedLang() ?>/">Télécharger l'app </a></li>
                                    <li class="nav-item"><a class="nav-link" href="https://blog.justauth.me/">Le blog </a></li>
                                    <li class="nav-item"><a class="nav-link" href="https://github.com/justauthme/demo-website">Voir sur github </a></li>
                                </ul>
                                <a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="https://developers.justauth.me"><i class="fas fa-star mr-1"></i>Ajouter à mon site</a>
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
                            <div class="col-md-6 text-md-right small">
                                <a href="#">Privacy Policy</a>
                            </div>
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
