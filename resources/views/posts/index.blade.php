@extends('layouts.master')

@section('title')
Blog | @parent
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Blog</h1>
        <ul>
           <?php foreach($posts as $post): ?>
               <li>
                   <span class="date">{{ $post->date->format('d-m-Y') }}</span>
                   <h3><a href="{{ URL::route('blog.show', [$post->slug]) }}"><?php echo $post->status == 'draft' ? '[Draft]' : ''; ?> {{ $post->title }}</a></h3>
               </li>
           <?php endforeach; ?>
        </ul>
    </div>
</div>
@stop