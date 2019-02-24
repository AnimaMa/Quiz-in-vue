<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#317EFB"/>


    {{--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
    {{--<script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>--}}
    <link rel="stylesheet" type="text/css" href="{{ url('css/all.css') }}">


</head>

<body>
<div id="app">

  <header>
     <div class="wrap">
         <router-link to="/home">Home</router-link>
         <router-link to="/competition">Competitions</router-link>
         <router-link to="/quiz"> Quizzes</router-link>

     </div>
  </header>
    {{--<router-link to="/searching">Searching</router-link>--}}
    <div class="wrap">
        <router-view></router-view>
    </div>

</div>


@if(App::isLocal())
    <script src="/js/all.js"></script>
@else
    <script src="{{ elixir('js/all.js') }}"></script>
@endif

</body>



</html>


