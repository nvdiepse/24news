@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">{{ code }}</div>
        <p class="lead text-gray-800 mb-5">{{ msg }}</p>
        <a href="/admin/dashboard">← Back to Dashboard</a>
    </div>
</div>
@endsection