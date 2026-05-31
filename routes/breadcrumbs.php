<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('subjects', function (BreadcrumbTrail $trail) {
    $trail->push('Предметы', route('subjects'));
});

Breadcrumbs::for('themes', function (BreadcrumbTrail $trail, $subject) {

    $trail->parent('subjects');
    $trail->push($subject->title, route('themes', $subject->id)
    );
});

Breadcrumbs::for('lesson', function (BreadcrumbTrail $trail, $lesson) {

    $trail->parent('themes', $lesson->theme->subject);

    $trail->push($lesson->title, route('lesson', $lesson->id));
});


Breadcrumbs::for('test', function (BreadcrumbTrail $trail, $test) {
    $trail->parent('themes', $test->theme->subject);

    $trail->push('Тест', route('test', $test->id));
});


Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Панель администратора', route('dashboard'));
});

Breadcrumbs::for('admin-users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Список пользователей', route('admin-users'));
});

Breadcrumbs::for('admin-subjects', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Список предметов', route('admin-subjects'));
});

Breadcrumbs::for('admin-subjects-create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-subjects');
    $trail->push('Создать предмет', route('admin-subjects-create'));
});


Breadcrumbs::for('admin-themes', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Список тем', route('admin-themes'));
});

Breadcrumbs::for('admin-themes-create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-themes');
    $trail->push('Создать тему', route('admin-themes-create'));
});

Breadcrumbs::for('admin-lessons', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Список уроков', route('admin-lessons'));
});

Breadcrumbs::for('admin-lessons-create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-lessons');
    $trail->push('Создать урок', route('admin-lessons-create'));
});
