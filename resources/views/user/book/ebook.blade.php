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
                                        <h3 class="course__sidebar-title">Filter Kategori</h3>
                                        <ul id="categoryFilter">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <div class="course__sidebar-check mb-10 d-flex align-items-center">
                                                        <input class="categoryFilter m-check-input" type="radio"
                                                            name="categorySort" value="{{ $category->slug }}"
                                                            id="{{ $category->name }}CourseIn">
                                                        <label class="m-check-label"
                                                            for="{{ $category->name }}CourseIn">{{ $category->name }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                {{-- sort --}}
                                <div class="course__sidebar-widget white-bg">
                                    <div class="course__sidebar-info">
                                        <h3 class="course__sidebar-title">Urut</h3>
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
                                {{-- <div class="course__sidebar-widget white-bg">
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
                                </div> --}}
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
                                <div class="course__view" id="countBook">
                                    <h4>Menampilkan 0 E-Book</h4>
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
            getBook()
        });

        const x = Object.fromEntries(
            Object.entries($('.m-check-input')).map(
                ([k, v]) => [v.value, v.checked]
            )
        )

        $(".formSearchDesktop").submit(function(e) {
            e.preventDefault();
            getBook()
        });
        $(".formSearchMobile").submit(function(e) {
            e.preventDefault();
            getBook()
        });

        function createSlug(title) {
            let slug = title.toLowerCase().replace(/ /g, "-");
            slug = slug.replace(/[^a-z0-9-]/g, "");
            return slug;
        }

        function getBook(device) {
            // loading state
            $("#courseCategory").html(
                `<div class="text-center text-4xl col-span-full pt-100 pb-65"><i class="fas fa-spinner-third spinners-3"></i></div>`
            );
            let search = "";
            if (device == "desktop") {
                $("#searchBookMobile").val("");
                search = $("#searchBookDesktop").val();
            } else if (device == "mobile") {
                $("#searchBookDesktop").val("");
                search = $("#searchBookMobile").val();
            } else {
                if ($("#searchBookDesktop").val() != "") {
                    search = $("#searchBookDesktop").val();
                } else if ($("#searchBookMobile").val() != "") {
                    search = $("#searchBookMobile").val();
                }
            }
            $.ajax({
                type: "GET",
                url: "{{ route('ebook.data') }}",
                data: {
                    sort: $("input[name='sort']:checked").val(),
                    category: $("input[name='categorySort']:checked").val(),
                    search: search,
                },
                success: function(response) {
                    let htmlString = ``;
                    $("#countBook").html(`<h4>Menampilkan ${response.data.bookCount} E-Book</h4>`);
                    if (response.data.bookCount === 0) {
                        // empty state
                        htmlString = emptyState('Maaf, buku belum tersedia');
                    } else {
                        const dateOption = {
                            day: '2-digit',
                            month: 'long',
                            year: 'numeric'
                        };
                        // success state
                        $.map(response.data.books, function(book, index) {
                            htmlString += `<div class="col-span-2-book">
                                                <div class="mb-30 h-100">
                                                    <div class="course__item-2 transition-3 white-bg fix">
                                                        <div class="course__thumb-2 w-img fix">
                                                            <figure class="mb-0 position-relative">
                                                                <img src="{{ asset('storage/${book.cover}') }}"
                                                                    alt="${book.title} book thumbnail">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <div class="course__content-2 px-0" style="padding-top: 10px">
                                                        <p
                                                            class="course__title-2 line-clamp-3-hover text-sm leading-lg mb-0">
                                                            ${book.title}
                                                        </p>
                                                        <p class="mb-10 fw-medium text-muted text-xs">${book.author}</p>
                                                        <p class="mb-10 fw-medium text-muted text-xs">${book.publisher}(${book.year})</p>
                                                        <p class="mb-10 fw-medium text-muted text-xs">Jumlah download: <span class="fw-semibold">${book.download}</span></p>
                                                    </div>
                                                </div>
                                            </div>`
                        });
                    }
                    $("#courseCategory").html(htmlString);

                    if (device == "desktop") {
                        $("#searchBookMobile").val("");
                    } else if (device == "mobile") {
                        $('#offcanvasmodal').modal('hide');
                        $("#searchBookDesktop").val("");
                    }
                },
                // error state
                error: function() {
                    $("#courseCategory").html(errorState());
                }
            });
        }

        $('#categoryFilter').on('change', '.categoryFilter', function() {
            getBook();
        });
        $('#sorting').on('change', '.sorting', function() {
            getBook();
        });
        $('#priceFilter').on('change', '.priceFilter', function() {
            getBook();
        });
    </script>
@endsection
