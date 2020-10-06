{{--
  Template Name: Sidebar form
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <article @php post_class() @endphp>
      @php the_content() @endphp
    </article>
  @endwhile
@endsection
