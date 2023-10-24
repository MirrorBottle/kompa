@extends('web.layouts.index')
@section('title', 'Home')
@section('content')


    {{-- HERO --}}
    @include('web.home.components.hero')

    {{-- ABOUT --}}
    @include('web.home.components.about')

    {{-- FEATURES --}}
    @include('web.home.components.features')

    {{-- HOW IT WORKS --}}
    @include('web.home.components.how-it-works')

    {{-- PRICING --}}
    @include('web.home.components.pricing')

    {{-- CTA --}}
    @include('web.home.components.cta')

    {{-- FAQ --}}
    @include('web.home.components.faq')

@endsection
