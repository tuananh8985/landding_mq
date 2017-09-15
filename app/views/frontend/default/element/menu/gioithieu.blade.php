@extends('frontend.default.layouts.master_post_detail')
@section('content')
<section class="tz-sectionBreadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="tz_breadcrumb_single_cat_title">
					<h4>
					</h4>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="tz-breadcrumb">
					<h4>
						<!-- Breadcrumb NavXT 5.7.1 -->
						<span typeof="v:Breadcrumb">
							<a rel="v:url" property="v:title" title="Tới Trang Chủ" href="{{route('home')}}" class="home">Trang Chủ</a>
						</span>
						&nbsp;<span>/</span>&nbsp;
						<span typeof="v:Breadcrumb">
							<a rel="v:url" property="v:title" title="Go to the Meetup category archives." class="taxonomy category">Giới Thiệu</a>
						</span>    
					</h4>
				</div>

			</div>
		</div>
	</div><!--end class container-->
</section>
<section class="container tz-blogSingle">
	<div class="row">
		<!-- aaaaâ -->
		<div class="col-md-8 col-md-offset-2">
			<div class="tz-blogContainer">
				<div id="post-702" class="tz-blogItem">
					<div class="tz-blogContent">
						<!-- begin -->
						@foreach($data as $item)
						<div class="tz-blogBox ">
							<div class="tz-BlogImage">
								<img width="1193" height="671" src="{{asset($item->image)}}" class="attachment-full size-full wp-post-image" alt="" srcset="{{asset($item->image)}}" sizes="(max-width: 1193px) 100vw, 1193px">
								<div class="tz-ImageOverlay"></div>
							</div>
							<div class="tz_blog_box_content">
								<h4 class="title">
									<a href="{{$item->link()}}">
										{{$item->SoftTrim($item->title,100)}}                      
									</a>
								</h4>
								<span class="tzinfomation">
									<small class="tzinfomation_time">

										{{$item->created_at}} 
									</small>
								</span>

								<p>{{$item->SoftTrim($item->description,200)}}</p>

								<a href="{{$item->link()}}" class="tzreadmore">
									<span>
										Chi Tiết<i class="fa fa-long-arrow-right"></i>
									</span>
								</a>

							</div>


						</div>
						@endforeach
						<!-- End begin -->
					</div>
				</div>

			</div>
		</div>
		<!-- aaaaâ -->

		<div class="col-md-8 col-md-offset-2">
			{{$data->links()}}
		</div>
	</div>
</section>
@stop