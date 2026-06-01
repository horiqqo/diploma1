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

Breadcrumbs::for('admin-tests', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Список тестов', route('admin-tests'));
});

Breadcrumbs::for('admin-tests-create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-tests');
    $trail->push('Создать тест', route('admin-tests-create'));
});

Breadcrumbs::for('admin-tests-edit', function (BreadcrumbTrail $trail, $test) {
    $trail->parent('admin-tests');
    $trail->push('Редактирование теста', route('admin-tests-edit', $test->id));
});

Breadcrumbs::for('admin-questions', function (BreadcrumbTrail $trail, $test) {
    $trail->parent('admin-tests');
    $trail->push('Вопросы: ' . $test->title, route('admin-questions', $test->id));
});

Breadcrumbs::for('admin-questions-create', function (BreadcrumbTrail $trail, $test) {
    $trail->parent('admin-questions', $test);
    $trail->push('Создать вопрос', route('admin-questions-create', $test->id));
});

Breadcrumbs::for('admin-questions-edit', function (BreadcrumbTrail $trail, $question) {
    $trail->parent('admin-questions', $question->test);
    $trail->push('Редактирование вопроса', route('admin-questions-edit', $question->id));
});

Breadcrumbs::for('admin-answers', function (BreadcrumbTrail $trail, $question) {
    $trail->parent('admin-questions', $question->test);
    $trail->push('Ответы: ' . $question->question, route('admin-answers', $question->id));
});

Breadcrumbs::for('admin-answers-create', function (BreadcrumbTrail $trail, $question) {
    $trail->parent('admin-answers', $question);
    $trail->push('Создать ответ', route('answers.store', $question->id));
});

Breadcrumbs::for('admin-answers-edit', function (BreadcrumbTrail $trail, $answer) {
    $trail->parent('admin-answers', $answer->question);
    $trail->push('Редактирование ответа', route('admin-answers-update', $answer->id));
});
