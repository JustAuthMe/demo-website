<?php

use PitouFW\Model\UserModel;
use function PitouFW\Core\t;
use function PitouFW\Core\webroot;

if (UserModel::isLogged()): ?>
<header class="page-header page-header-light bg-white">
    <div class="page-header-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <img class="mb-4 rounded-pill" src="<?= WEBROOT . UserModel::get()->getPicture() ?>" style="width: 15rem;" />
                    <h1 class="page-header-title"><?= L::home_user_hello(UserModel::get()->getFullname()) ?></h1>
                    <p class="page-header-text">
                        <?= L::home_user_welcome ?><br />
                        <small><?= L::home_user_date(date(L::date_format, strtotime(UserModel::get()->getRegTimestamp()))) ?></small>
                    </p>
                    <a href="<?= webroot() ?>user/logout" class="btn btn-secondary btn-marketing rounded-pill mr-2 mb-2">
                        <i class="fas fa-user-times pr-1"></i>
                        <?= L::home_user_quit ?>
                    </a>
                    <a href="<?= webroot() ?>user/delete" class="btn btn-danger btn-marketing rounded-pill mb-2" onclick="return confirm('Êtes-vous sur ?')">
                        <i class="fas fa-user-slash pr-1"></i>
                        <?= L::home_user_delete ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<?php else: ?>
<header class="page-header page-header-dark bg-img-repeat pt-5 pt-lg-15" style='background: #2a79b0 url("<?= IMG ?>pattern-shapes.png")'>
    <div class="page-header-content">
        <div class="container px-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="page-header-title"><?= L::home_guest_title ?></h1>
                    <p class="page-header-text"><?= L::home_guest_desc ?></p>
                </div>
                <div class="col-lg-6">
                    <div class="card rounded-lg text-dark">
                        <div class="card-header py-4"><?= L::home_guest_baseline ?></div>
                        <div class="card-body p-0 endless-form-container">
                            <div class="jam-overlay">
                                <div class="jam-card text-center py-4">
                                    <div class="text-gray-500"><?= L::home_guest_try ?></div>
                                    <div class="jam-button d-block mt-3" data-shape="rounded" data-app-id="<?= JAM_APP_ID ?>" data-lang="<?= t()->getAppliedLang() ?>" data-callback="<?= JAM_CALLBACK_DEFAULT ?>"></div>
                                </div>
                            </div>
                            <div class="endless-form">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapFirstName"><?= L::home_guest_form_lastname ?></label><input required class="form-control rounded-pill" id="leadCapFirstName" type="text" /></div>
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapLastName"><?= L::home_guest_form_firstname ?></label><input required class="form-control rounded-pill" id="leadCapLastName" type="text" /></div>
                                    </div>
                                    <div class="form-group"><label class="small text-gray-600" for="leadCapEmail"><?= L::home_guest_form_email ?></label><input required class="form-control rounded-pill" id="leadCapEmail" type="email" /></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapFirstName"><?= L::home_guest_form_pass ?></label><input required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" class="form-control rounded-pill" id="leadCapFirstName" type="password" /></div>
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapLastName"><?= L::home_guest_form_pass2 ?></label><input required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" class="form-control rounded-pill" id="leadCapLastName" type="password" /></div>
                                    </div>
                                    <div class="form-group"><label class="small text-gray-600" for="leadCapEmail"><?= L::home_guest_form_street ?></label><input required class="form-control rounded-pill" id="leadCapEmail" type="text" /></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapFirstName"><?= L::home_guest_form_postal_code ?></label><input required class="form-control rounded-pill" id="leadCapFirstName" type="tel" /></div>
                                        <div class="form-group col-md-6"><label class="small text-gray-600" for="leadCapLastName"><?= L::home_guest_form_city ?></label><input required class="form-control rounded-pill" id="leadCapLastName" type="text" /></div>
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
