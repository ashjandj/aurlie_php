@extends('layouts.frontend.app')
@section('title', $cms->page_title)
@section('main-class', $cms->slug)
@section('meta-title', $cms->meta_title)
@section('meta-keywords', $cms->meta_keywords)
@section('meta-description', $cms->meta_description)
@section('content')


<!-- Hero Section -->
<section class="py-16 md:py-10 bg-gradient-to-br from-white via-white to-accent/5">
    <div class="container">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">{{ $cms->page_title }}</h1>
            <p class="text-lg text-foreground/70">{{ $cms->meta_description }}</p>
            <p class="text-sm text-foreground/60 mt-2">Last updated: January 2025</p>
        </div>
    </div>
</section>
 <!-- Main Content -->
 <section class="py-16 md:py-10 bg-white">
    <div class="container">
    {!! $cms->page_content !!}
    </div>
</section>
@endsection