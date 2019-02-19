<?php
    $videoId = $_GET['video_id'];
    $title = $_GET['title'];
    $image = $_GET['image'];
    $videoSrc = "https://www.youtube.com/embed/$videoId?autoplay=1";
?>

@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="css/detail.css">

    <style>
        #video{
            background-image: url(<?php echo $image; ?>);
        }

        .back-link{
            margin-right: auto;
        }
    </style>
@endsection

@section('nav')
    <a class="back-link" href="{{ url('/') }}">BACK TO SEARCH</a>
@endsection

@section('content')
    <div id="wrapper">
        <div id="video">
            <button id="playButton">
                <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                <span>Play Video</span>
            </button>

            <iframe frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <h1><?php echo $title; ?></h1>
    </div>
@endsection

@section('scripts')
    <script>
        var videoSrc = "<?php echo $videoSrc; ?>";
        var video = $('#video');
        var iframe = $('iframe');
        var playButton = $('#playButton');

        $(document).ready(function(){
            @auth
                saveVideoToWatched()
            @endauth

            playButton.click(playVideo);
        });

        function saveVideoToWatched(){
            var url = "{{url('/saveToWatched')}}";
            var token = '{{csrf_token()}}';
            var auth_user_id = '{{Auth::user() ? Auth::user()->id : null}}';

            var data = {
                _token: token,
                video_id: '{{$videoId}}',
                title: '{{$title}}',
                image_url: '{{$image}}',
                user_id: auth_user_id
            }

            $.post(url, data, function(res){
                console.log("Result from saving video!", res);
            });
        }

        function playVideo(){
            iframe.prop('src', videoSrc);
            video.addClass('playing');
        }
    </script>
@endsection
