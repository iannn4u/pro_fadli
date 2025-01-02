@extends('dashboard.layouts.index')

@section('main')
    <h3 class="text-3xl font-semibold dark:text-white mb-10">{{ $title }}</h3>
    <form class="max-w-sm" action="/users/create" method="post">
        @csrf
        <div class="mb-5">
            <label for="name_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
            <input type="text" id="name_user" name="name_user" value="{{ old('name_user') }}" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
        <div class="mb-5">
            <label for="username_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input type="text" id="username_user" name="username_user" value="{{ old('username_user') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <div class="mb-5">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Role</label>
            <select id="countries" name="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @if (old('role') == 'admin')
                    <option selected value="admin">Admin</option>
                    <option value="unboxer">Unboxer</option>
                    <option value="supplier">Supplier</option>
                @elseif(old('role') == 'unboxer')
                    <option value="admin">Admin</option>
                    <option selected value="unboxer">Unboxer</option>
                    <option value="supplier">Supplier</option>
                @else
                    <option value="admin">Admin</option>
                    <option value="unboxer">Unboxer</option>
                    <option selected value="supplier">Supplier</option>
                @endif
            </select>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="text" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
