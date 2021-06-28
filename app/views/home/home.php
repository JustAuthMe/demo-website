<?php

use PitouFW\Model\UserModel;
use function PitouFW\Core\webroot;

if (UserModel::isLogged()): ?>
<header class="page-header page-header-light bg-white">
    <div class="page-header-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <img class="mb-4 rounded-pill" src="<?= WEBROOT . UserModel::get()->getPicture() ?>" style="width: 15rem;" />
                    <h1 class="page-header-title">Bonjour <?= UserModel::get()->getFullname() ?>,</h1>
                    <p class="page-header-text">
                        Bienvenue sur la démo de JustAuthMe.
                    </p>
                    <a href="<?= webroot() ?>user/logout" class="btn btn-secondary btn-marketing rounded-pill mr-2 mb-2">
                        <i class="fas fa-user-times pr-1"></i>
                        Quitter la démo
                    </a>
                    <a href="<?= webroot() ?>user/delete" class="btn btn-danger btn-marketing rounded-pill mb-2" onclick="return confirm('Êtes-vous sur ?')">
                        <i class="fas fa-user-slash pr-1"></i>
                        Supprimer mes infos
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<?php else: ?>
<header class="page-header page-header-dark bg-img-repeat pt-5 pt-lg-15" style='background: #2a79b0 url("assets/img/pattern-shapes.png")'>
    <div class="page-header-content">
        <div class="container px-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="page-header-title">Découvrez la puissance de JustAuthMe grâce à notre démo</h1>
                    <p class="page-header-text">Terminé les formulaires, les mots de passe, les e-mails de confirmations, les codes par SMS. Cliquez sur un bouton, Scannez un QR-Code, Approuvez la connexion et ça y est : vous êtes connecté !</p>
                </div>
                <div class="col-lg-6">
                    <div class="card rounded-lg text-dark">
                        <div class="card-header py-4">Marre des mots de passe et des formulaires sans fin ?</div>
                        <div class="card-body p-0 endless-form-container">
                            <div class="jam-overlay">
                                <div class="jam-card text-center py-4">
                                    <div class="text-gray-500">Essayez plutôt notre technologie :</div>
                                    <div class="jam-button d-block mt-3" data-shape="rounded" data-app-id="<?= JAM_APP_ID ?>" data-callback="<?= JAM_CALLBACK_DEFAULT ?>"></div>
                                </div>
                            </div>
                            <div class="endless-form">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapFirstName">Nom</label><input required class="form-control rounded-pill" id="leadCapFirstName" type="text" /></div>
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapLastName">Prénom</label><input required class="form-control rounded-pill" id="leadCapLastName" type="text" /></div>
                                    </div>
                                    <div class="form-group"><label class="small text-gray-600" for="leadCapEmail">Adresse e-mail valide</label><input required class="form-control rounded-pill" id="leadCapEmail" type="email" /></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapFirstName">Mot de passe robuste</label><input required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" class="form-control rounded-pill" id="leadCapFirstName" type="password" /></div>
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapLastName">Confirmation du mot de passe</label><input required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" class="form-control rounded-pill" id="leadCapLastName" type="password" /></div>
                                    </div>
                                    <div class="form-group"><label class="small text-gray-600" for="leadCapEmail">Adresse de livraison</label><input required class="form-control rounded-pill" id="leadCapEmail" type="text" /></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapFirstName">Code postal</label><input required class="form-control rounded-pill" id="leadCapFirstName" type="tel" /></div>
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapLastName">Ville</label><input required class="form-control rounded-pill" id="leadCapLastName" type="text" /></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-angled text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" fill="currentColor"><polygon points="0,100 100,0 100,100"></polygon></svg>
    </div>
</header>
<?php endif ?>
