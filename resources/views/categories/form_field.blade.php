<div class="mb-3">
    {{ Form::label('name','Nombre de la categoria',['class' => 'form-label']) }}
    {{ Form::text('name',null,['class' => 'form-control','maxlength' => 50]) }}
</div>

<div class="mb-3">
    {{ Form::label('description','Descripción de la categoria',['class' => 'form-label']) }}
    {{ Form::textarea('description',null,['class' => 'form-control','rows' => '4']) }}
</div>