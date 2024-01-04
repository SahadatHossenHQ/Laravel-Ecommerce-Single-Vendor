@extends('layouts.frontend.app')
@push('meta')
<meta name='description' content="Category blogs"/>
<meta name='keywords' content="{{$blog->title}}" />
@endpush

@section('title',$blog->title)
@push('css')
<style>
    label.btn.rounded-circle.active {
        box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
    }
    .rounded-10{
        border-radius: 10px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap');
    .footer-menu{
        display: none !important
    }
    .card {
        position: relative;
        display: flex;
        padding: 0;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: none;
        box-shadow: none;
    }

    .media img {
        width: 50px;
        height: 50px
    }

    .reply a {
        text-decoration: none
    }


    .heading {
        font-size: 25px;
        margin-right: 25px;
    }
    .fa {
        font-size: 25px;
    }
    .checked {
        color: orange;
    }
    /* Three column layout */
    .side {
        float: left;
        width: 15%;
        margin-top: 10px;
    }

    .middle {
        float: left;
        width: 70%;
        margin-top: 10px;
    }

    /* Place text to the right */
    .right {
        text-align: right;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* The bar container */
    .bar-container {
        width: 100%;
        background-color: #f1f1f1;
        text-align: center;
        color: white;
    }
    footer{
        padding-bottom: 44px
    }

.thumbnail img{
    height:500px;
    object-fit: fill;
}
@media(max-width:767px){
    .thumbnail img{
    height:auto;
    }
}
    /* Individual bars */
    .bar-5 {width: 60%; height: 18px; background-color: #04AA6D;}
    .bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
    .bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
    .bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
    .bar-1 {width: 15%; height: 18px; background-color: #f44336;}

    /* Responsive layout - make the columns stack on top of each other instead of next to each other */
    @media (max-width: 400px) {
        .side, .middle {
            width: 100%;
        }
        /* Hide the right column on small screens */
        .right {
            display: none;
        }
    }
    #comment-reply i{
        font-size: 14px;
    }
</style>
@endpush
@section('content')
<div class="blog-single">
        <div class="container">
          <div class="single-blog-content">
            <div class="tilte"><h2><b>{{$blog->title}}</b></h2></div>
            <div class="single-info">
                <span>{{$blog->created_at}}</span>
                <span> {{$blog->user->name}}</span>
                <!-- <span>30 Comments</span> -->
            </div>
            <div class="thumbnail">
                <img src="{{asset('/')}}uploads/blogs/{{$blog->thumbnail}}" alt="">
            </div>
            <div style="font-weight: 600;" class="single-blog-descritption">
               <p>
                   {!! $blog->description !!}
               </p>
            </div>
                <div class="casrd">
                    <div class="card-body">
                        <div class="{{$blog->comments->count() > 0 ? 'card':''}}">
                                
                            <div class="co">
                                                @forelse ($blog->comments as $comment)
                                                <div class="media mb-4"> 
                                                    <img class="mr-3 rounded-10" alt="Avatar" src="{{$comment->user->avatar == 'default.png' ? '/default/default.png':'/uploads/admin/'.$comment->user->avatar}}" />
                                                    <div class="media-body">
                                                        <div class="row">
                                                            <div class="col-8 d-flex">
                                                                <h5>{{$comment->user->name}}</h5> 
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <div class="pull-right reply">
                                                                    @auth
                                                                    <a href="javascript:void(0)" id="comment-reply" data-id="{{$comment->id}}" data-slug="{{$blog->id}}">
                                                                        <span><i class="fa fa-reply"></i> reply</span>
                                                                    </a> 
                                                                    @else 
                                                                    <a href="javascript:void(0)" class="btn disabled">
                                                                        <span><i class="fa fa-reply"></i> reply</span>
                                                                    </a>   
                                                                    @endauth
                                                                    
                                                                </div>
                                                            </div>
                                                        </div> 
                                                       <p style="margin-top:-7px"> {{$comment->body}}</p>
                                                        <p style="font-size: 11px;color: #3e3939;">{{$comment->created_at->diffForHumans()}}</p>
                                                        @forelse ($comment->replies as $reply)
                                                        <div class="media mt-4"> 
                                                            <a class="pr-3" href="#">
                                                                <img class="rounded-10" alt="Avatar" src="{{$reply->user->avatar == 'default.png' ? '/default/default.png':'/uploads/admin/'.$reply->user->avatar}}" />
                                                            </a>
                                                            <div class="media-body">
                                                                <div class="row">
                                                                    <div class="col-12 d-flex">
                                                                        <h5>{{$reply->user->name}}</h5>
                                                                    </div>
                                                                </div> 
                                                                  <p style="margin-top:-7px"> {{$reply->body}}</p>
                                                        <p style="font-size: 11px;color: #3e3939;">{{$reply->created_at->diffForHumans()}}</p>
                                                            </div>
                                                        </div>
                                                        @empty
                                                            
                                                        @endforelse
                                                        
                                                        <div class="reply-box"></div>
                                                        
                                                    </div>
                                                </div>
                                                @empty
                                                    <h3 class="text-center text-danger">Comments not available</h3>
                                                @endforelse
                                
                            </div>
                                    
                        </div>
                        @auth
                        <form style="margin-top: 30px;" action="{{route('blog.comment',['slug'=>$blog->id])}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for=""><b>Write Comment</b></label>
                                    <textarea style="width: 100%;" class="form-control"  name="comment" id="comment" required></textarea>
                                    @error('comment')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <input style="margin-top: 20px;background: #f57224;" type="submit"" value="Save" class="button">
                                </div>
                            </div>
                        </form>
                        @endauth
                        
                    </div>
                </div>
    </div>
    </div>
    <style>
        /* blog-single */
.blog-single{
    background: #f1f1f1;
    padding-top: 30px;
}
.blog-single .single-blog-content{
    background: white;
    padding: 40px;
}
.blog-single .single-blog-content .single-info{
    border-top:2px solid black;
    border-bottom:2px solid black;
    margin:10px 0px;
    padding: 7px;
}
.blog-single .single-blog-content .single-info span{
    margin-left: 10px;
}
.blog-single .single-blog-content .sub-title h5{
    margin: 0PX;
}
.blog-single .single-blog-content .sub-title{
    background: black;
    color: white;
    padding: 10px 10px;
    border-left: 50px solid #e23939;
    margin-bottom: 20px;
}
.blog-single .single-blog-content {
    font-weight: 600;
    font-size: 16px;
}
.title{
    font-weight: initial;font-size: 22px;
}
/* ********************************************blog-layout-desing-end****************************************** */

    </style>
@endsection

@push('js')
<script src="{{asset('/')}}assets/frontend/js/jquery.flexslider.js"></script>
<script src="{{asset('/')}}assets/frontend/js/image-zoom.js"></script>
<script src="{{asset('/')}}assets/frontend/js/toast.min.js"></script>

@auth
    <script>
        $(document).ready(function () {
            $(document).on('click', '#comment-reply', function(e) {
                e.preventDefault();

                var replyBox = document.getElementsByClassName("reply-box");
                for (var i = 0; i < replyBox.length; i++) {
                    $(replyBox[i]).empty();
                }
                let id   = $(this).data('id');
                let slug = $(this).data('slug');
                let children = $(this).parent().parent().parent().parent().find('.reply-box');
                let url = '/blog/comment/reply/'+slug+'/'+id
                let csrf = $('meta[name="csrf-token"]').attr('content')
                let html = '<div class="media mt-4">';
                html += '<div class="media-body">';
                html += '<form action="'+url+'" method="post">';
                html += '<input type="hidden" name="_token" value="'+csrf+'">';
                html += '<div class="form-group">';
                html += '<label for="reply">Reply</label>';
                html += '<input required type="text" name="reply" id="reply" class="form-control" placeholder="Write comment reply">';
                html += '<small class="form-text text-danger"></small>';
                html += '</div>';
                html += '<div class="form-group text-right">';
                html += '<button type="submit" class="btn btn-success">Submit</button>';
                html += '</div>';
                html += '</form>';
                html += '</div>';
                html += '</div>';

                $(children).html(html);
            })
        });
    </script>
@endauth
@endpush