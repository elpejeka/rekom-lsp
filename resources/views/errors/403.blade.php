@extends('errors::minimal')

@section('title', __('Belum Dapat Melakukan Verifikasi'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Belum Dapat Melakukan Verifikasi'))
