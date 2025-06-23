
@forelse ($data['courses'] as $Course)
    @php
        $inWishlist = false;
        foreach ($data['wishlist'] as $wishlist) {
            if ($Course['id'] == $wishlist['course_id']) {
                $inWishlist = true;
                break;
            }
        }
    @endphp
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-10">
        <div class="course-box product_course d-flex   position-relative">
            <div class="product w-100">
                <div class="product-img">
                    <a >
                        <img class="img-fluid course-card-img" alt=""
                             src="{{ "https://theteachertool.com/admin/files/courses/images/".$Course['image_name'] }}"
                             style="">
                    </a>
                    <div class="price-text">
                        <h6 class="fs-10px mb-0 text-white"><span>{{$Course['course_id']}}</span>
                        </h6>
                    </div>
                    {{--                                            <div class="heart-three">--}}
                    {{--                                                @if($inWishlist)--}}
                    {{--                                                    <a href="#"><i class="fa-solid fa-heart"></i></a>--}}

                    {{--                                                @else--}}
                    {{--                                                    <a href="#"><i class="fa-regular fa-heart"></i></a>--}}
                    {{--                                                @endif--}}
                    {{--                                            </div>--}}
                    <div class="price" style="@foreach($data['subjects'] as $Subject)
                                                    @if($Course['c_id'] == $Subject['id'])
                                                    @php
                                                        // Replace this with the actual code to get the background color from the backend
                                                        $backgroundColor = $Subject['color']; // For example
                                                        // Calculate the luminance of the background color
                                                        $luminance = (0.299 * hexdec(substr($backgroundColor, 1, 2))) +
                                                                     (0.587 * hexdec(substr($backgroundColor, 3, 2))) +
                                                                     (0.114 * hexdec(substr($backgroundColor, 5, 2)));

                                                        // Decide the text color based on the background luminance
                                                        $textColor = ($luminance > 128) ? 'text-black' : 'text-white';
                                                    @endphp
                                                        background-color: {{$backgroundColor }};
                                                    @endif
                                                @endforeach">
                        @if($Course['grade'] == -1)
                            <h3 class="fs-6 {{ $textColor }}">PK</h3>
                        @elseif($Course['grade'] == 0)
                            <h3 class="fs-6 {{ $textColor }}">K</h3>
                        @else
                            <h3 class="fs-6 {{ $textColor }}">{{$Course['grade']}}</h3>
                        @endif
                    </div>

                </div>
                <div class="product-content pt-0 pt-md-4">
                    <div class="course-group d-flex justify-content-between  mb-0 flex-column flex-md-row">
                        @foreach($data['teachers'] as $Teacher)
                            @if($Course['teacher_id'] == $Teacher['id'])

                                <div class="course-group-img mt-0 mt-xxl-0 d-flex">
                                    <h3 class="title instructor-text"><a

                                            class="course-description fs-6">{{$Course['title']}}</a>
                                    </h3>
                                </div>
                            @endif
                        @endforeach
                        @php
                            $ratings = DB::table('course_rating')
                                        ->where('course_id', $Course['id'])
                                        ->select(DB::raw('COUNT(*) as count, AVG(rating) as average'))
                                        ->first();
                            $count = $ratings->count;
                            $average_rating = $ratings->average;
                            $full_stars = floor($average_rating);
                            $half_star = ceil($average_rating - $full_stars);
                            $empty_stars = 5 - ($full_stars + $half_star);
                        @endphp
                        <div class="align-items-center flex-wrap d-flex d-md-block justify-content-between text-md-end">
                                                        <span class="text-dark fs-12px text-end  mb-0 "><span class="text-dark fs-12px fw-bold text-end">Views</span> (@if ($Course['views'] > 1000){{ number_format($Course['views'] / 1000, 1) }}K)
                                                        @else{{ $Course['views'] }})@endif</span>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center d-md-block fs-10px w-100 min-w-100px mt-xl-0 rating mb-2 text-xl-end">
                                    @for($i = 1; $i <= $full_stars; $i++)
                                        <i class="fas fa-star  filled fs-10px"></i>
                                    @endfor
                                    @for($i = 1; $i <= $half_star; $i++)
                                        <i class="fas fa-star-half-alt filled fs-10px"></i>
                                    @endfor
                                    @for($i = 1; $i <= $empty_stars; $i++)
                                        <i class="fas fa-star fs-10px"></i>
                                    @endfor

                                    <span
                                        class="ms-2 d-flex justify-content-end average-rating text-dark">

                                    <span>{{ number_format($average_rating, 1) }} </span>
                                </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{--                                            <hr>--}}
                    {{--                                            @foreach($data['subjects'] as $Subject)--}}
                    {{--                                                @if($Course['c_id'] == $Subject['id'])--}}
                    {{--                                                    <div class="align-items-center border-0 course-info mb-0">--}}
                    {{--                                                        <div class="rating-img  ms-0 ">--}}
                    {{--                                                            @foreach($data['subjects'] as $Subject)--}}
                    {{--                                                                @if($Course['c_id'] == $Subject['id'])--}}
                    {{--                                                                    <p class=" ms-0  text-dark fs-14px">{{$Subject['c_name']}}</p>--}}
                    {{--                                                                @endif--}}
                    {{--                                                            @endforeach--}}
                    {{--                                                        </div>--}}
                    {{--                                                        <div class="course-view  ms-0 ">--}}
                    {{--                                                            @foreach($data['sub_subjects'] as $SubSubject)--}}
                    {{--                                                                @if($Course['sc_id'] == $SubSubject['id'])--}}
                    {{--                                                                    <p class=" ms-0  text-dark fs-12px">{{$SubSubject['sc_name']}}</p>--}}
                    {{--                                                                @endif--}}
                    {{--                                                            @endforeach--}}
                    {{--                                                        </div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                @endif--}}
                    {{--                                            @endforeach--}}
                </div>

            </div>

            <div class="align-items-center d-flex position-absolute product-hover">
                <div class="product-content">
                    <div class="course-group mt-0 d-flex align-items-center">
                        <div class=" ">
                            <h3 class="title instructor-text"><a class="course-description"
                                >{{$Course['title']}}</a>
                            </h3>
                        </div>

                        <div
                            class="d-block d-md-none course-share">

                            @if($inWishlist)
                                @auth('student')
                                    <a href="#"
                                       onclick="RemoveFromWishList('{{$Course['id']}}','{{ $data['courses']->currentPage() }}')"><i
                                            class="fa-solid fa-heart"></i></a>
                                @else
                                    <a href="#" onclick="loginfirst()"><i
                                            class="fa-solid fa-heart"></i></a>
                                @endauth
                            @else
                                @auth('student')
                                    <a href="#" onclick="AddToWishList('{{$Course['id']}}','{{ $data['courses']->currentPage() }}')"><i
                                            class="fa-regular fa-heart"></i></a>
                                @else
                                    <a href="#" onclick="loginfirst()"><i
                                            class="fa-regular fa-heart"></i></a>
                                @endauth
                            @endif


                        </div>
                    </div>

                    <div class="course-group d-flex align-items-center">
                        <div class="d-none d-md-block ">
                            <h3 class="title instructor-text fs-14px "><a
                                    class="course-description text-white"
                                >{{$Course['description']}}</a>
                            </h3>
                        </div>

                        <div
                            class="d-none d-md-block course-share">

                            @if($inWishlist)
                                @auth('student')
                                    <a href="#"
                                       onclick="RemoveFromWishList('{{$Course['id']}}','{{ $data['courses']->currentPage() }}')"><i
                                            class="fa-solid fa-heart"></i></a>
                                @else
                                    <a href="#" onclick="loginfirst()"><i
                                            class="fa-solid fa-heart"></i></a>
                                @endauth
                            @else
                                @auth('student')
                                    <a href="#" onclick="AddToWishList('{{$Course['id']}}','{{ $data['courses']->currentPage() }}')"><i
                                            class="fa-regular fa-heart"></i></a>
                                @else
                                    <a href="#" onclick="loginfirst()"><i
                                            class="fa-regular fa-heart"></i></a>
                                @endauth
                            @endif


                        </div>
                    </div>
                    @foreach($data['subjects'] as $Subject)
                        @if($Course['c_id'] == $Subject['id'])
                            <div
                                class="course-info flex-wrap d-flex align-items-center justify-content-between">
                                <div class="rating-img  ms-0  d-flex align-items-center">
                                    @foreach($data['subjects'] as $Subject)
                                        @if($Course['c_id'] == $Subject['id'])
                                            <p class=" ms-0 dotted-title text-white fs-14px">{{$Subject['c_name']}}</p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="course-view  ms-0  d-flex align-items-center">
                                    @foreach($data['sub_subjects'] as $SubSubject)
                                        @if($Course['sc_id'] == $SubSubject['id'])
                                            <p class=" ms-0  dotted-title text-white fs-12px">{{$SubSubject['sc_name']}}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class=" justify-content-between d-flex align-items-center flex-wrap">


                        <div
                            class=" all-category  mt-2 mt-xxl-0">
                            <a href="{{url('/course_view/'.$Course['id'])}}"
                               class="btn rounded-2 btn-become">Go To Course</a>
                        </div>
                        @foreach($data['quizes'] as $Quiz)
                            @if($Course['id'] == $Quiz['course_id'])
                                @auth('student')
                                    @if(auth('student')->user()->valid_till >= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', now()))
                                        <div
                                            class="all-category mt-2 mt-xxl-0">
                                            <a href="{{url('/quiz_start/'.$Course['id'])}}"
                                               class="btn rounded-2 btn-become fw-bold">Take Quiz</a>
                                        </div>
                                    @else
                                        @if(auth('student')->user()->quizes_attempt <= 10)
                                            <div
                                                class="all-category mt-2 mt-xxl-0">
                                                <a href="{{url('/quiz_start/'.$Course['id'])}}"
                                                   class="btn rounded-2 btn-become fw-bold">Take Quiz</a>
                                            </div>
                                        @else
                                            <div
                                                class="all-category mt-2 mt-xxl-0">
                                                <a onclick="subscribefirst()"
                                                   class="btn rounded-2 btn-become fw-bold ">Take Quiz</a>
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <div
                                        class="all-category mt-2 mt-xxl-0">
                                        <a onclick="loginfirst()" class="btn rounded-2 btn-become fw-bold">Take Quiz</a>
                                    </div>
                                @endauth

                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

@empty
    <h1>No Courses</h1>
@endforelse
{{ $data['courses']->links() }}
