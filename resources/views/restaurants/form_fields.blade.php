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