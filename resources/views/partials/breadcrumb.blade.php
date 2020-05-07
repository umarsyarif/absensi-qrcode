<?php
$data = $breadcrumbs ?? [];
?>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        @foreach ($data as $key => $breadcrumb)
            @if(\Illuminate\Support\Facades\Route::has($key))
                <li class="breadcrumb-item"><a href="{{route($key)}}"><?=$breadcrumb?></a></li>
            @endif
        @endforeach
        <li class="breadcrumb-item active">{{$title}}</li>
    </ol>
</div>
