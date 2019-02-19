@extends('layouts.app')

@section('content')
    <img id="logo" src="img/logo.jpg" alt="">
    <input id="searchBox" type="text" placeholder="Search videos">

    <div id="loaderDiv">
        <img src="img/spinner.svg" alt="">
    </div>

    <div id="wrapper">
        <h1 id="sectionTitle">Watched Videos</h1>

        @foreach ($watched_videos as $video)
            @php
                $video_url = route('detail');
                $video_url .= '?video_id=' . $video->video_id;
                $video_url .= '&title=' . $video->title;
                $video_url .= '&image='. $video->image_url;
            @endphp

            <a href="{{$video_url}}" class="video-item">
                <img src="{{$video->image_url}}" alt="">
                <h3>{{$video->title}}</h3>
            </a>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script>
        var searchBox, wrapper, body;
        $(document).ready(function(){
            searchBox = $("#searchBox");
            wrapper = $("#wrapper");
            body = $("body");

            searchBox.keyup(function(e){
                // $(this) gives you the input element
                var input = $(this);

                // e.keyCode gives you code clicked key
                // enter element has keyCode of 13
                var keyIsEnter = e.keyCode === 13;

                if(keyIsEnter){
                    // get value of input element
                    var query = input.val();

                    // clear contents of wrapper div
                    wrapper.html('');
                    body.addClass('loading first-time-loaded');

                    // fetch videos using value entered by user
                    fetchVideos(query);
                }
            });
        });

        function createVideoItemTemplate(image, title, videoId){
            // uncomment line below to go straight to youtube
            // var image_url = `https://www.youtube.com/watch?v=${videoId}`;
            var image_url = `{{ route('detail') }}?video_id=${videoId}&title=${title}&image=${image}`;

            return $(`
                <a href="${image_url}" class="video-item search-result">
                    <img src="${image}" alt="">
                    <h3>${title}</h3>
                </a>
            `);
        }

        function fetchVideos(searchTerm){
            var wrapper = $("#wrapper");
            var API_KEY = 'AIzaSyAq8HPrbemKw4a23McQJD9ksl2w2lGAcII';
            var maxResults = 16;
            var URL = 'https://www.googleapis.com/youtube/v3/search?part=snippet'
            URL += `&key=${API_KEY}&q=${searchTerm}&type=video`;
            URL += `&maxResults=${maxResults}`;

            $.get(URL, function(result){
                body.removeClass('loading');

                var videos = result.items;

                for(var i = 0; i < videos.length; i++){
                    var video = videos[i];
                    var videoId = video.id.videoId;
                    var title = video.snippet.title;
                    var image = video.snippet.thumbnails.medium.url;
                    var template = createVideoItemTemplate(image, title, videoId);

                    wrapper.append(template);
                }
            });
        }
    </script>
@endsection
