<div class="mb-3">
    {{ Form::label('name','Nombre',['class' => 'form-label']) }}
    {{ Form::text('name',null,['class' => 'form-control','maxlength' => 50]) }}
</div>

<div class="mb-3">
    {{ Form::label('description','Descripción',['class' => 'form-label']) }}
    {{ Form::textarea('description',null,['class' => 'form-control','rows' => '4']) }}
</div>

<div class="mb-3">
    {{ Form::label('city','Ciudad',['class' => 'form-label']) }}
    {{ Form::text('city',null,['class' => 'form-control','maxlength' => 30]) }}
</div>

<div class="mb-3">
    {{ Form::label('phone','Telefono',['class' => 'form-label']) }}
    {{ Form::text('phone',null,['class' => 'form-control','maxlength' => 10]) }}
</div>

<div class="mb-3">
    {{ Form::label('delivery','Tiene domicilio?',['class' => 'form-label']) }}
    {{ Form::select('delivery', ['y' => 'Si', 'n' => 'no'],null,['class' => 'form-control']); }}
</div>

<div class="mb-3">
    {{ Form::label('category_id','Categoria',['class' => 'form-label']) }}
    {{ Form::select('category_id', $categories,null,['class' => 'form-control']); }}
</div>

<div class="mb-3">
    {{ Form::label('schedule','Horario de apertura: ',['class' => 'form-label']) }}
    {{ Form::time('schedule',null,['class' => 'form-control']); }}
</div>

<div class="mb-3">
    {{ Form::label('latitude','Latitud',['class' => 'form-label']) }}
    {{ Form::text('latitude',null,['class' => 'form-control']); }}
</div>

<div class="mb-3">
    {{ Form::label('longitude','Longitud',['class' => 'form-label']) }}
    {{ Form::text('longitude',null,['class' => 'form-control']); }}
</div>

<div class="mb-3">
    {{ Form::label('logo','Logo',['class' => 'form-label']) }}
    {{ Form::file('logo',null,['class' => 'form-control']); }}
</div>

<div class="mb-3">
    {{ Form::label('facebook','Facebook',['class' => 'form-label']) }}
    {{ Form::url('facebook',null,['class' => 'form-control']); }}
</div>

<div class="mb-3">
    {{ Form::label('twitter','Twitter',['class' => 'form-label']) }}
    {{ Form::url('twitter',null,['class' => 'form-control']); }}
</div>

<div class="mb-3">
    {{ Form::label('instagram','Instagram',['class' => 'form-label']) }}
    {{ Form::url('instagram',null,['class' => 'form-control']); }}
</div>

<div class="mb-3">
    {{ Form::label('youtube','Youtube',['class' => 'form-label']) }}
    {{ Form::url('youtube',null,['class' => 'form-control']); }}
</div>