@extends('menu')

@section('content')
        <div id="app">
            <profile-component></profile-component>
         </div>
         <script src="{{ mix('js/app.js') }}"></script>

@endsection
