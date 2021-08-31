@extends('menu')

@section('content')
        <div id="app">
            <home-component></home-component>
         </div>
         <script src="{{ mix('js/app.js') }}"></script>

@endsection
