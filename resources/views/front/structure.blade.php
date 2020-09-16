@extends('layout.index')
@section('content')
<section class="page page_heading">
	<img class="page_heading_img" src="/img/structure_bg.jpg" alt=""></img>
	<div class="container">
		<div class="title">{{__('lang.Структура')}}</div>
		<ul class="breadcrumbs">
			<li><a href="index.html">{{__('lang.Главная')}}</a></li>
			<li><a>{{__('lang.О нас')}}</a></li>
			<li><a>{{__('lang.Структура')}}</a></li>
		</ul>
	</div>
</section>

<section class="structure_section">
	<div class="container">
		<div class="title">Структура РГКП “Центр судебных экспертиз Министерства юстиции Республики Казахстан”</div>
		<div class="struture_img" data-fancybox data-src="img/structure_main.png">
			<img src="img/structure_main.png">
		</div>
	</div>
</section>

<section class="dark_blue">
	<div class="container">
		<div class="team_list">
			<div class="team_item">
				<div class="team_img">
					<img src="img/team_1.jpg">
				</div>
				<div class="dir_position">Председатель Совета директоров ЦСЭ</div>
				<div class="team_name">Кайратов Серик Арманович</div>
			</div>
			<div class="team_item">
				<div class="team_img">
					<img src="img/team_2.jpg">
				</div>
				<div class="dir_position">Председатель Совета директоров ЦСЭ</div>
				<div class="team_name">Кайратов Серик Арманович</div>
			</div>
		</div>
	</div>
</section>

<section class="light_blue">
	<div class="container">
		<div class="team_list">
			<div class="team_item">
				<div class="team_img">
					<img src="img/team_1.jpg">
				</div>
				<div class="dir_position">Председатель Совета директоров ЦСЭ</div>
				<div class="team_name">Кайратов Серик Арманович</div>
			</div>
			<div class="team_item">
				<div class="team_img">
					<img src="img/team_2.jpg">
				</div>
				<div class="dir_position">Председатель Совета директоров ЦСЭ</div>
				<div class="team_name">Кайратов Серик Арманович</div>
			</div>
			<div class="team_item">
				<div class="team_img">
					<img src="img/team_2.jpg">
				</div>
				<div class="dir_position">Председатель Совета директоров ЦСЭ</div>
				<div class="team_name">Кайратов Серик Арманович</div>
			</div>
		</div>
	</div>
</section>
@include('include.map');
<section>
	<div class="container">
		@include('include.partner');
	</div>
</section>
@endsection