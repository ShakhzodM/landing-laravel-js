<div class="wrapper container-fluid">
	{!! Form::open(['url'=>route('servicesEdit', ['service'=>$data['id']]), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

		<div class="form-group">
			{!! Form::label('name', 'Название', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::text('name', $data['name'], ['class'=>'form-control', 'placeholder'=>'Введите название страницы']) !!}
				
			</div>
		</div>


		<div class="form-group">
			{!! Form::label('text', 'Текст', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::textarea('text', $data['text'], ['id'=>'editor','class'=>'form-control', 'placeholder'=>'Введите текст']) !!}
				
			</div>
		</div>



		<div class="form-group">
			{!! Form::label('icon', 'Иконка', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::select('icon', array('fa-apple'=>'fa-apple', 'fa-html5'=>'fa-html5', 'fa-dropbox'=>'fa-dropbox', 'fa-slack'=>'fa-slack', 'fa-users'=>'fa-users'), $data['icon']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-offset-2 col-xs-10">
				{!! Form::button('Сохранить', ['class'=>'btn btn-primary','type'=>'submit']) !!}
				
			</div>
		</div>

	{!! Form::close() !!}
	
</div>
