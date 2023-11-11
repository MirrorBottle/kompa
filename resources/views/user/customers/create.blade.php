@extends('layouts.admin.index')
@section('title', 'Tambah Departemen')
@section('content')
<div class="flex pt-16 overflow-hidden bg-gray-100 h-full">
    <div id="main-content"
        class="relative w-full max-w-screen-2xl mx-auto h-full overflow-y-auto bg-gray-100 px-5">
        <main>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden ">
                <div class="py-5 px-4 lg:py-5">
                    <form action="" method="post">
                        @include('user.customers.form')
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>

@endsection
