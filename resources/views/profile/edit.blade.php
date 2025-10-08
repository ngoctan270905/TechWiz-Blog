@extends('layouts.app')

@section('title', 'Hồ sơ cá nhân')

@section('content')
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-md shadow-sm sticky top-0">
        <div class="max-w-6xl mx-auto flex items-center justify-between py-4 px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="max-w-6xl mx-auto flex items-center justify-between py-4 px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="max-w-6xl mx-auto flex items-center justify-between py-4 px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
