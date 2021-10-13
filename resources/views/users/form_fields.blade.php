<div class="mb-3">
    {{ Form::label('name','Nombre',['class' => 'form-label']) }}
    {{ Form::text('name',null,['class' => 'form-control','maxlength' => 50]) }}
</div>

<div class="mb-3">
    {{ Form::label('email','Email',['class' => 'form-label']) }}
    {{ Form::email('email',null,['class' => 'form-control']) }}
</div>

<div class="mb-3">
    {{ Form::label('password','Contraseña',['class' => 'form-label']) }}
    {{ Form::text('password',null,['class' => 'form-control','maxlength' => 30]) }}
</div>

<div class="mb-3">
    {{ Form::label('type','Tipo',['class' => 'form-label']) }}
    {{ Form::select('type', ['user' => 'Usuario', 'owner' => 'Dueño', 'admin' => 'Administrador'],null,['class' => 'form-control']); }}
</div>
