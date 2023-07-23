@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="search-container">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                <div class="text-center" style="max-width: 480px">
                    <figure class="seacrh-image-container"><img src="{{ asset('assets/img/decoration/zoom-out.png') }}"
                            alt="zoom out logo" class=""></figure>
                    <h3 class="mb-2 fw-bold">Search: <span class="fw-bold">{{ $search }}</span></h3>
                    <h3 class="fw-bold">No matching search result</h3>
                    <p>Your search did not match any documents. Try again using more general search forms</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
