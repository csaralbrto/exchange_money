@extends('menu')

@section('content')
        <div id="app">
            <login-component></login-component>
         </div>
         <script src="{{ mix('js/app.js') }}"></script>

@endsection
