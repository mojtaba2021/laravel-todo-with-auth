<x-app-layout>
    <x-slot name="head">
        <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet"
              type="text/css"/>
        <link rel="stylesheet" href="{{asset('css/tasks/app.css')}}">
        <script src="{{asset('js/tasks/app.js')}}"></script>
    </x-slot>
    <x-slot name="header">

        {{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
        {{--            {{ __('tasks') }}--}}
        {{--        </h2>--}}
    </x-slot>

    <section class="min-vh-100 gradient-custom">

        <div class="container py-5 h-100 col-12">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <h1 class="text-sm-center">ToDo List</h1>

                <div class="col-xs-12 col-xl-10">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-unstyled">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body p-sm-0 p-md-5">

                            <div class="row">
                                @yield('form')

                            </div>


                            <!-- Tabs content -->
                            <div class="row pr-2">
                                <div class="tab-content" id="ex1-content">
                                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                                         aria-labelledby="ex1-tab-1">
                                        <ul class="list mb-0 pr-5">


                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                                            data-bs-target="#nav-home" type="button" role="tab"
                                                            aria-controls="nav-home" aria-selected="true">All
                                                    </button>
                                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                                            data-bs-target="#nav-profile" type="button" role="tab"
                                                            aria-controls="nav-profile" aria-selected="false">Removed
                                                    </button>

                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                     aria-labelledby="nav-home-tab">
                                                    <div class="row mx-auto">
                                                        @if($tasks)
                                                            @foreach($tasks as $task)
                                                                @if(is_null($task->deleted_at))
                                                                    <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                                                        style="background-color: #f4f6f7;">


                                                                        <div class="col-11">

                                                                            {{--                                                                        <input class="form-check-input me-2" type="checkbox"--}}
                                                                            {{--                                                                               value="{{$task->title}}"--}}
                                                                            {{--                                                                               aria-label="..."/>--}}
                                                                            <span class="p-3"><a
                                                                                    class="text-decoration-none"
                                                                                    href="{{route('tasks.edit',$task->id)}}">{{$task->title}}</a></span>

                                                                        </div>


                                                                        <div class="col-1 ">
                                                                            <form
                                                                                action="{{route('tasks.destroy',$task->id)}}"
                                                                                method="post">

                                                                                @csrf

                                                                                {{method_field('DELETE')}}

                                                                                <button type="submit"
                                                                                        class="text-right btn-close "
                                                                                        aria-label="Close"></button>
                                                                            </form>
                                                                        </div>


                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                     aria-labelledby="nav-profile-tab">
                                                    <div class="row mx-auto">

                                                        @if($tasks)
                                                            @foreach($tasks as $task)
                                                                @if(!is_null($task->deleted_at))


                                                                    <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                                                        style="background-color: #f4f6f7;">


                                                                        <div class="col-10">
                                                                            {{--                                                                        <input class="form-check-input me-2" type="checkbox"--}}
                                                                            {{--                                                                               value="{{$task->title}}"--}}
                                                                            {{--                                                                               aria-label="..."/>--}}
                                                                            <span class="p-3">{{$task->title}}</span>

                                                                        </div>


                                                                        <div class="col-2 ">


                                                                            <a class="text-sm-center btn btn-outline-info"
                                                                               href="{{route('tasks.restore',$task->id)}}"
                                                                            >Restore</a>

                                                                        </div>


                                                                    </li>
                                                                @endempty
                                                            @endforeach
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                                     aria-labelledby="nav-contact-tab">...
                                                </div>
                                            </div>


                                            {{--                                    <div class="row mx-auto">--}}
                                            {{--                                        @if($tasks)--}}
                                            {{--                                            @foreach($tasks as $task)--}}

                                            {{--                                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"--}}
                                            {{--                                                    style="background-color: #f4f6f7;">--}}


                                            {{--                                                    <div class="col-11">--}}
                                            {{--                                                        <input class="form-check-input me-2" type="checkbox"--}}
                                            {{--                                                               value="{{$task->title}}"--}}
                                            {{--                                                               aria-label="..."/>--}}
                                            {{--                                                        <span class="p-3"><a class="text-decoration-none"--}}
                                            {{--                                                                             href="{{route('edit',$task->id)}}">{{$task->title}}</a></span>--}}

                                            {{--                                                    </div>--}}


                                            {{--                                                    <div class="col-1 ">--}}
                                            {{--                                                        <form action="{{route('destroy',$task->id)}}" method="post">--}}
                                            {{--                                                            @csrf--}}
                                            {{--                                                            {{method_field('DELETE')}}--}}
                                            {{--                                                            <button type="submit" class="text-right btn-close "--}}
                                            {{--                                                                    aria-label="Close"></button>--}}
                                            {{--                                                        </form>--}}
                                            {{--                                                    </div>--}}


                                            {{--                                                </li>--}}
                                            {{--                                            @endforeach--}}
                                            {{--                                        @endif--}}

                                            {{--                                    </div>--}}


                                        </ul>
                                    </div>


                                </div>
                            </div>
                            </div>


                    </div>
                </div>
            </div>
    </section>
    {{--    <div class="py-12">--}}

    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--                <div class="p-6 bg-white border-b border-gray-200">--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</x-app-layout>
