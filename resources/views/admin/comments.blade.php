@extends('admin.master')

@section('title')
    نظرات
@endsection

@section('content')
    @inject('Product', '\App\Models')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold"></h5>

                            <p class="card-text">
                                <div class="col-12 mb-4 d-flex flex-row justify-content-between flex-wrap">
                                @foreach ($comments as $comment)

                                @php
                                    $product = $Product::findById($comment->product_id)[0];
                                @endphp

                                    <div class="col-3 card bg-light p-3 mr-1 shadow">
                                        <div class="card-body p-0">
                                            <p class="alert alert-secondary p-2">
                                                <span>محصول : </span>
                                                <span class="alert-secondary">
                                                    {{ $product->title }}
                                                </span>
                                            </p>
                                            <span class="rk-desc p-lg-2 p-4 d-block display-5">
                                                <b>{{ $comment->name }}</b>
                                            </span>
                                            <span class="rk-desc p-lg-2 p-4 d-block display-5">
                                                <b class="muted">{{ $comment->email }}</b>
                                            </span>
                                            <span class="rk-price p-lg-2 p-4 d-block display-5">
                                                <span>{{ $comment->comment }}</span>
                                            </span>
                                        </div>
                                        @if (!$comment->valid)
                                            <div class="alert alert-danger">این نظر تایید نشده است</div>
                                        @endif

                                        <div>
                                            <a class="btn btn-primary" 
                                            href="{{ url('admin/comments/add/'.$comment->id) }}">
                                            <span class="text-white">تایید نظر</span>
                                            </a> 
                                            <a class="btn btn-warning" 
                                            href="{{ url('admin/comments/delete/'.$comment->id) }}">
                                            <span>حذف نظر</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                </div>

                                <nav class="col-12">
                                  <ul class="pagination d-flex d-flex justify-content-center">

                                    @if ($page - 1 >= 0)
                                        <li class="page-item" style="order:1;">
                                          <a class="page-link" href="
                                          {{ url('admin/comments/'.(string)($page - 1)) }}">
                                            <span aria-hidden="true">صفحه قبل</span>
                                            <span class="sr-only">Previous</span>
                                          </a>
                                        </li>
                                    @endif

                                    <li class="page-item" style="order:2;">
                                      <a class="page-link" href="
                                      {{ url('admin/comments/'.(string)($page +1)) }}" aria-label="Next">
                                        <span aria-hidden="true">صفحه بعد</span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    </li>
                                  </ul>
                                </nav>

                            </p>

                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection

