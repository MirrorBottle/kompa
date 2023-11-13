
@extends('layouts.admin.index')
@section('title', 'Profile')
@section('content')
@include('user.profile.tab')

    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        @include('user.profile.dataDiri')
        @include('user.profile.hisKomisi')
        @include('user.profile.changePass')
    </div>



@endsection
