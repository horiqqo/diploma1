<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('subjects', function (BreadcrumbTrail $trail) {
    $trail->push('Предметы', route('subjects'));
});

Breadcrumbs::for('themes', function (BreadcrumbTrail $trail) {
    $trail->parent('subjects');
    $trail->push('Темы', route('themes'));
});

Breadcrumbs::for('lesson', function (BreadcrumbTrail $trail) {
    $trail->parent('themes');
    $trail->push('Урок', route('lesson'));
});

Breadcrumbs::for('test', function (BreadcrumbTrail $trail) {
    $trail->parent('lesson');
    $trail->push('Тест', route('test'));
});



Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Панель администраторы', route('dashboard'));
});

Breadcrumbs::for('admin-users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Список пользователей', route('admin-users'));
});

Breadcrumbs::for('admin-subjects', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Список предметов', route('admin-subjects'));
});
