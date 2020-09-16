<div class="about_partners">
	<div class="title title_left">{{__('lang.Полезные ссылки')}}</div>
	<div class="partner_list">
		@foreach(\App\Partner::where('id','>',0)->orderBy('created_at')->get() as $partner)
            <div>
				<a class="partner" href="{{$partner->link}}" target="_blank">
					<div class="partner_img">
						<img src="{{asset('partners/'.$partner->image)}}">
					</div>	
					<span class="partner__heading">
						{{$partner->title}}				
					</span>
				</a>
			</div>
        @endforeach
	</div>
</div>