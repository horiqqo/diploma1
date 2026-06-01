@extends('errors.layout')

@section('title', 'Слишком много запросов')
@section('code', '429')
@section('message', 'Превышено допустимое количество запросов. Попробуйте позже.')
