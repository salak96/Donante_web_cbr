@extends('layouts.auth', ['title' => 'Login - Admin'])

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-300 px-6">
    <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
        <div class="flex justify-center items-center">
            <span class="text-gray-700 font-semibold text-2xl">LOGIN</span>
        </div>

        @if (session('status'))
        <div class="bg-green-500 p-3 rounded-md shadow-sm mt-3 text-white text-sm text-center">
            {{ session('status') }}
        </div>
        @endif

        <form class="mt-4" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="block text-gray-700 text-sm">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="mt-1 block w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none"
                    placeholder="Alamat Email">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="block text-gray-700 text-sm">Password</label>
                <input type="password" name="password"
                    class="mt-1 block w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none"
                    placeholder="Password">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-red-600">
                    <span class="ml-2 text-gray-600 text-sm">Ingatkan Saya</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm font-medium text-black hover:underline">
                    Lupa Password?
                </a>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full py-2 px-4 bg-red-600 text-white text-sm font-semibold rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                    LOGIN
                </button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <span class="text-gray-600">Belum punya akun? </span>
            <a href="{{ route('register') }}" class="text-red-600 font-semibold hover:underline">
                Daftar Sekarang
            </a>
        </div>
    </div>
</div>
@endsection
