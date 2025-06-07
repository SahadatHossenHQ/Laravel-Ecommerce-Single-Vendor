@extends('layouts.frontend.app')
@push('meta')
<meta name='description' content="Category Products"/>
<meta name='keywords' content="@foreach($blogs as $blog){{$blog->title.', '}}@endforeach" />
@endpush

@section('title', 'Blogs')
@section('content')
<style>
    /* ********************************************blog-4-desing****************************************** */

.blog-section-4 .blogs-4 .blog-4 .thumbnail img{
    width:100%;
    height: 200px;
}
.blog-section-4 .blogs-4{
    margin-bottom: 20px;
}
.blog-section-4 .blogs-4 .blog-4{
    margin-bottom: 60px;
}
.blog-section-4 .blogs-4 .title{
    margin-bottom: 20px;
    font-weight: initial;
text-transform: capitalize;
font-size: 19px;
margin-bottom: 10px !important;
}
.blog-section-4 .blogs-4 .blog-4 a{
    color: black;
    background: white;
padding: 10px;
box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
border-radius: 5px;
display: block;
height: 100%;
}
.blog-section-4 .blogs-4 .blog-4  a:hover,.blog-section-4 .blogs-4 .blog-4  a:hover p{
    color: #ff4200 !important;
    text-decoration: none;
}
.blog-section-4 .blogs-4 .blog-4 .title{
margin: 10px 0px;}
.blog-section-4 .blogs-4 .blog-4 p{
    color: rgba(0, 0, 0, 0.788);
    text-align: justify;
}

     .posts .user-info{
          display: flex;
          align-items: center;
          padding: 0px 10px;
     }
     .user-info .avatar img{
          width: 50px;
          height: 50px;
          border-radius: 50%;
          margin-right: 10px;
     }
    
     .posts .user-info .user-name span:last-child{
          display: block;
          color: #514f4f;
          font-size: 11px;
     }
     .posts .post-contents{
          margin-top: 15px;
     }
     .posts .post-contents .description{
          margin-bottom: 15px;
     }
     .posts .post-contents .thumbnail img,.posts .post-contents .thumbnail video{
          width: 100%;
     }

     
     
  
</style>
<ul style="display:flex" class="under-menu">
    <li><a href="{{route('campaing')}}" class="{{Request::is('campaing*') ? 'active':''}}">Campaign</a> </li>
    <li><a href="{{route('blogs')}}" class="{{Request::is('blogs*') ? 'active':''}}">Blogs</a></li>
    <li><a href="{{route('blog.ceo')}}" class="{{Request::is('blog/ceo*') ? 'active':''}}">CEO</a></li>
</ul>
<div class="category-thumbanial" style="padding-bottom: 40px;margin-top:20px">
    <div class="containe box-sh">
            <div class="blog-section-4">
                <div class="contain">
                    <div class="blogs-4">
                        <div class="row posts">
                    
                        @foreach($blogs as $blog)
                            <div class="blog-4 col-md-4 col-sm-6 col-6">
                                <a href="{{route('blog.show',['blog'=>$blog->id])}}">
                                    <div class="post">
                                <div class="nc">
                                    <div class="user-info">
                                        <div class="avatar">
                                            <img src="{{asset('/')}}uploads/admin/{{$blog->user->avatar}}" alt="">
                                        </div>
                                        <div class="user-name">
                                            <span><b>{{$blog->user->name}}  </b></span>
                                            <span>{{$blog->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div class="post-contents">
                                         <div class="title"><h5><b>{{$blog->title}} </b></h5></div>
                                        <div class="description">
                                             {!! $blog->description !!}
                                        </div>
                                        <div class="thumbnail">
                                             <img src="{{asset('/')}}uploads/blogs/{{$blog->thumbnail}}" alt="">
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                                </a>
                            </div>

                        @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection


