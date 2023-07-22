@extends('user.layout.app')

@section('content')
    <main>
        {{-- course area start --}}
        <section class="course__area pt-80 pb-70 grey-bg-3">
            <div class="container">
                <div class="row">
                    {{-- filter --}}
                    <div class="col-xxl-3 col-xl-3 col-lg-4">
                        <div class="course__sidebar">
                            {{-- sorting --}}
                            <form action="">
                                {{-- category --}}
                                <div class="course__sidebar-widget white-bg">
                                    <div class="course__sidebar-info">
                                        <h3 class="course__sidebar-title">Category Filter</h3>
                                        <ul id="categoryFilter">
                                            {{-- @foreach ($categories as $category)
                                                <li>
                                                    <div class="course__sidebar-check mb-10 d-flex align-items-center">
                                                        <input class="categoryFilter m-check-input" type="radio"
                                                            name="categorySort" value="{{ $category->slug }}"
                                                            id="{{ $category->name }}CourseIn">
                                                        <label class="m-check-label"
                                                            for="{{ $category->name }}CourseIn">{{ $category->name }}</label>
                                                    </div>
                                                </li>
                                            @endforeach --}}
                                        </ul>
                                    </div>
                                </div>
                                {{-- sort --}}
                                <div class="course__sidebar-widget white-bg">
                                    <div class="course__sidebar-info">
                                        <h3 class="course__sidebar-title">Sorting</h3>
                                        <ul id="sorting">
                                            <li>
                                                <div class="course__sidebar-check mb-10 d-flex align-items-center">
                                                    <input class="sorting m-check-input" type="radio" name="sort"
                                                        value="newRelease" id="newReleaseIn">
                                                    <label class="m-check-label" for="newReleaseIn">Terbaru</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="course__sidebar-check mb-10 d-flex align-items-center">
                                                    <input class="sorting m-check-input" type="radio" name="sort"
                                                        value="popular" id="popularIn">
                                                    <label class="m-check-label" for="popularIn">Paling Populer</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- price --}}
                                <div class="course__sidebar-widget white-bg">
                                    <div class="course__sidebar-info">
                                        <h3 class="course__sidebar-title">Class Filter</h3>
                                        <ul id="classFilter">
                                            <li>
                                                <div class="course__sidebar-check mb-10 d-flex align-items-center">
                                                    <input class="classFilter m-check-input" type="radio" name="sort"
                                                        value="class10" id="class10In">
                                                    <label class="m-check-label" for="class10In">Kelas X</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="course__sidebar-check mb-10 d-flex align-items-center">
                                                    <input class="classFilter m-check-input" type="radio" value="class11"
                                                        name="sort" id="class11In">
                                                    <label class="m-check-label" for="class11In">Kelas XI</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="course__sidebar-check mb-10 d-flex align-items-center">
                                                    <input class="classFilter m-check-input" type="radio" value="class12"
                                                        name="sort" id="class12In">
                                                    <label class="m-check-label" for="class12In">Kelas XII</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- course --}}
                    <div class="col-xxl-9 col-xl-9 col-lg-8">
                        {{-- control tab --}}
                        <div class="course__tab-inner white-bg mb-35">
                            <div class="course__tab-wrapper d-flex align-items-center">
                                {{-- display option --}}
                                <div class="course__tab-btn">
                                    <ul class="nav nav-tabs" id="courseTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#grid" type="button" role="tab" aria-controls="grid"
                                                aria-selected="true">
                                                <svg class="grid" viewBox="0 0 24 24">
                                                    <rect x="3" y="3" class="st0" width="7"
                                                        height="7" />
                                                    <rect x="14" y="3" class="st0" width="7"
                                                        height="7" />
                                                    <rect x="14" y="14" class="st0" width="7"
                                                        height="7" />
                                                    <rect x="3" y="14" class="st0" width="7"
                                                        height="7" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                {{-- count view course --}}
                                <div class="course__view" id="countCourse">
                                    <h4>Showing 0 E-Books</h4>
                                </div>
                            </div>
                        </div>
                        {{-- course item --}}
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="course__tab-content">
                                    <div class="tab-content" id="courseTabContent">
                                        <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                            aria-labelledby="grid-tab">
                                            <div class="d-grid gap-5 grid-cols-12" id="courseCategory"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            getCourse()
        });

        const x = Object.fromEntries(
            Object.entries($('.m-check-input')).map(
                ([k, v]) => [v.value, v.checked]
            )
        )

        $(".formSearchDesktop").submit(function(e) {
            e.preventDefault();
            getCourse()
        });
        $(".formSearchMobile").submit(function(e) {
            e.preventDefault();
            getCourse()
        });

        function createSlug(title) {
            let slug = title.toLowerCase().replace(/ /g, "-");
            slug = slug.replace(/[^a-z0-9-]/g, "");
            return slug;
        }

        function getCourse(device) {
            // loading state
            $("#courseCategory").html(
                `<div class="text-center text-4xl col-span-full pt-100 pb-65"><i class="fas fa-spinner-third spinners-3"></i></div>`
            );
            let search = "";
            if (device == "desktop") {
                $("#searchCourseMobile").val("");
                search = $("#searchCourseDesktop").val();
            } else if (device == "mobile") {
                $("#searchCourseDesktop").val("");
                search = $("#searchCourseMobile").val();
            } else {
                if ($("#searchCourseDesktop").val() != "") {
                    search = $("#searchCourseDesktop").val();
                } else if ($("#searchCourseMobile").val() != "") {
                    search = $("#searchCourseMobile").val();
                }
            }
            $.ajax({
                type: "GET",
                url: "{{ url('/course/data') }}",
                data: {
                    sort: $("input[name='sort']:checked").val(),
                    category: $("input[name='categorySort']:checked").val(),
                    search: search,
                },
                success: function(response) {
                    let htmlString = ``;
                    $("#countCourse").html(`<h4>Showing ${response.courseCount} Courses</h4>`);
                    if (response.courseCount === 0) {
                        // empty state
                        htmlString = emptyState('Maaf, kelas belum tersedia');
                    } else {
                        const currencyOption = {
                            style: 'currency',
                            currency: 'IDR',
                            currencyDisplay: 'symbol',
                            useGrouping: true,
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0,
                        };
                        const dateOption = {
                            day: '2-digit',
                            month: 'long',
                            year: 'numeric'
                        };
                        // success state
                        $.map(response.data, function(courseData, index) {
                            let coursePrice = parseInt(courseData.price);
                            let coursePriceDiscount = courseData.price - Math.ceil(courseData.price *
                                courseData.discount / 100);
                            let date = new Date(courseData.created_at);
                            let createAt = date.toLocaleDateString('id-ID', dateOption);
                            htmlString += `<div class="col-span-2-book">
                                                <div class="mb-30 h-100">
                                                    <div class="course__item-2 transition-3 white-bg fix">
                                                        <div class="course__thumb-2 w-img fix">
                                                            <figure class="mb-0 position-relative">
                                                                <img src="{{ asset('assets/img/dummy/Brown modern history book cover.png') }}"
                                                                    alt="${book.name} book thumbnail">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <div class="course__content-2 px-0" style="padding-top: 10px">
                                                        <p
                                                            class="course__title-2 line-clamp-3-hover text-sm leading-lg mb-0">
                                                            ${book.name}
                                                        </p>
                                                        <p class="mb-10 fw-medium text-muted text-xs">${book.author}</p>
                                                        <p class="mb-10 fw-medium text-muted text-xs">Jumlah: <span class="fw-semibold">${book.quantity}</span></p>
                                                    </div>
                                                </div>
                                            </div>`
                        });
                    }
                    $("#courseCategory").html(htmlString);

                    if (device == "desktop") {
                        $("#searchCourseMobile").val("");
                    } else if (device == "mobile") {
                        $('#offcanvasmodal').modal('hide');
                        $("#searchCourseDesktop").val("");
                    }
                },
                // error state
                error: function() {
                    $("#courseCategory").html(errorState());
                }
            });
        }

        $('#categoryFilter').on('change', '.categoryFilter', function() {
            getCourse();
        });
        $('#sorting').on('change', '.sorting', function() {
            getCourse();
        });
        $('#priceFilter').on('change', '.priceFilter', function() {
            getCourse();
        });
    </script>
@endsection
