<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('see homepage link');

$I->amOnPage("/admin");
$I->seeCurrentUrlEquals("/admin/login");
$I->seeLink("Üpel","/");
$I->see("Login Admin");

$I->wantTo("use homepage link");
$I->click("Üpel");
$I->seeCurrentUrlEquals("/");

$I->wantTo('login with existing user');

$I->amOnPage('/admin');

$I->seeCurrentUrlEquals('/admin/login');

$I->fillField('email', 'admin@ggios.pl');
$I->fillField('password', 'admin');

$I->click('#login_button');

$I->seeCurrentUrlEquals('/admin');

$I->see("Admin Panel");

