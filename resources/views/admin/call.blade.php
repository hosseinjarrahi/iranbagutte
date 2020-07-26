@extends('admin.master')
@section('title')
تماس با فروشگاه
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('manager/call') }}" method="post">
                                @csrf
                                <textarea class="p-0 m-0" name="main" style="width: 100%;" cols="5" rows="10">{{ $op->main }}</textarea>
                                <button type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=90tfl8gm8i68omi0xdbieo15w3clfx8a15bo4n6t0k3rx2pm"></script>
    <script src="{{ asset('js/tiny.js') }}"></script>
@endsection
