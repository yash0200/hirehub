@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container">
    <!-- Category Name and Description -->
    <div class="text-center">
        <h2>{{ $category->name }}</h2>
        <p>{{ $category->description ?? 'No description available.' }}</p>
    </div>

    <!-- Jobs in the Category -->
    <div class="row">
        @foreach ($jobs as $job)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('jobs.details', $job->id) }}">{{ $job->title }}</a>
                        </h4>
                        <h6 class="text-muted">{{ $job->company_name }} - {{ $job->location }}</h6>
                        <p>{{ Str::limit($job->description, 150) }}</p>
                        <p><strong>Salary:</strong> {{ $job->salary ?? 'Not specified' }}</p>
                        <p><strong>Job Type:</strong> {{ ucfirst($job->job_type) }}</p>
                        <a href="{{ route('jobs.details', $job->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination for Jobs -->
    <div class="mt-4">
        {{ $jobs->links() }} <!-- Pagination links -->
    </div>
</div>
@endsection
