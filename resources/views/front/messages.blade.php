@if($errors->any())
    <div class="alert alert-danger" style="margin: 3%;display: block;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif
@if(session('warning'))
    <div class="alert alert-warning">
        <p>یک خطا رخ داد.</p>
        <br>
        {{session('warning')}}
    </div>
@endif