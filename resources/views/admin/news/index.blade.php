@php
    /** @var \App\Models\Category[] $category */
@endphp

@include('blocks.header')


    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ __('labels.admin_news_create_txt') }}</h1>
            <p>
                <a class="btn btn-success" href="{{route('admin::news::create')}}">
                    {{ __('labels.admin_news_create_btn') }}
                </a>
            </p>

            @if (session('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert" id="my-alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <script>

                    window.setTimeout(function(){
                        $('#my-alert').alert('close');
                    },3000);

                </script>
            @endif

            <div class="list-group">
                @forelse ($news as $item)


                    <div href="#" class="list-group-item">
                        <h2>{{$item->title}}: {{ __('labels.news_category_txt') }}: {{$category[$item->category]}}</h2>
                        <p>
                            <a class="btn btn-primary" href="{{route('admin::news::update', ['id' => $item->id])}}">
                                {{ __('labels.news_edit_btn') }}
                            </a>
                            <a class="btn btn-danger" href="{{route('admin::news::delete', ['id' => $item->id])}}">
                                {{ __('labels.news_del_btn') }}
                            </a>
                        </p>

                    </div>

                @empty
                    {{ __('labels.news_nothing_txt') }}
                @endforelse
            </div>
            <hr>
            <div class="row justify-content-center">
                {{$news->links()}}
            </div>
        </div>
    </div>


@include('blocks.footer')
