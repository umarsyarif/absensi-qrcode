<?php
$title = 'Panduan';
?>
@extends('layouts.main')

@section('title', $title)

@section('content')
<div id="app">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- Page Title -->
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$title}}</h1>
                    </div>
                    {{-- @include('partials.breadcrumb', ['breadcrumbs' => ['search.index' => 'Pencarian']]) --}}
                </div>
            </div>
        </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                    <img src="images/SISTEM.jpg" class="img-thumbnail" alt="Responsive image" style="width: 100%; height: 700px"> 
            </div>
            
    </div>
</div>

    </div> <!-- /.modal -->

@endsection
