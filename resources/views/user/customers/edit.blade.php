@extends('layouts.admin.index')
@section('title', 'Edit Data Pelanggan')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

        <div class="py-5 px-4 lg:py-5">
            <form action="{{route('user.customers.update', $customer->id)}}" method="post">
                @method('PUT')
                @include('user.customers.form', ['data' => $customer])
            </form>
        </div>
    </div>

@endsection
