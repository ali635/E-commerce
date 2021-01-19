@if(Session::has('register'))
    <div class="container">
        <div class="alert alert-success text-center bold" role="alert">
            <h1>{{Session::get('register')}}</h1>
        </div>
    </div>
@endif