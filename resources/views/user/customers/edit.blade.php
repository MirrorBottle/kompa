@extends('layouts.admin.index')
@section('title', 'Tambah Departemen')
@section('content')
<div class="flex pt-16 overflow-hidden bg-gray-100 h-full">
    <div id="main-content"
        class="relative w-full max-w-screen-2xl mx-auto h-full overflow-y-auto bg-gray-100 px-5">
        <main>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                <div class="py-5 px-4 lg:py-5">
                    <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50"
                        role="alert">
                    </div>
                    <form action="{{route('user.customers.update', $customer->id)}}" method="post">
                        @method('PUT')
                        @include('user.customers.form', ['data' => $customer])
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>

@endsection
