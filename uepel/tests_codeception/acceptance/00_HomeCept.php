<?php
$I = new AcceptanceTester($scenario);

$I->wantTo('see title on homepage');
$I->amOnPage('/');
$I->seeInTitle('Üpel');

$I->wantTo('see login and FAQ links');
$I->seeLink('FAQ');
//$I->seeLink("TEACHER LOGIN", "/teacher/login");
$I->seeLink("TEACHER LOGIN", "/teachers/home");
//$I->seeLink("ADMIN LOGIN", "/admin/login");
$I->seeLink("ADMIN LOGIN", "/admin");
//$I->seeLink('STUDENT LOGIN, '/student/login');
$I->seeLink('STUDENT LOGIN','/student/home');







