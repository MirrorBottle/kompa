
@extends('layouts.admin.index')
@section('title', 'Profil')
@section('content')
@include('user.profile.tab')

    <div id="fullWidthTabContent" class="border-t border-gray-200 bg-red dark:border-gray-600">
        @include('user.profile.dataDiri')
        @include('user.profile.hisKomisi')
        @include('user.profile.changePass')
        @include('user.profile.team')
    </div>
@endsection
