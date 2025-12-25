@extends('dashboard.layouts.app')

@section('container')
@php
$judul = 'Profile';
@endphp
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex flex-row items-center justify-between p-6 pb-0 mb-4 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Profile</h6>
                </div>

                <div class="p-6 space-y-6">
                    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm">
                        @include('profile.partials.update-password-form')
                    </div>

                    <div class="p-6 bg-white border border-red-200 rounded-2xl shadow-sm">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
