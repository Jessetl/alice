<div class="tab-pane active" id="tab1">
	<div class="box-body">
		@include('estudiantes.forms.fields-photo')
	</div>
</div>
<div class="tab-pane" id="tab2">
	<div class="span11">
		<div class="span4">
			<div class="control-group">
				{!! Form::label('cedula', 'Cédula', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('cedula') ? ' has-error' : '' }}">
					{!! Form::text('cedula', $cedula, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '1784559961', 'title' => 'Introduzca la cédula del estudiante', 'disabled' => 'disabled']) !!}
                    {!! Form::hidden('nacionalidad_ced', $nacionalidad_ced) !!}
                    {!! Form::hidden('cedula', $cedula) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('apellido_paterno', 'Apellido paterno', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
					{!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'title' => 'Introduzca el apellido paterno del estudiante', 'placeholder' => 'Matute', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('nacionalidad', 'Nacionalidad', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('nacionalidad') ? ' has-error' : '' }}">
					{!! Form::text('nacionalidad', null, ['class' => 'form-control', 'title' => 'Introduzca la nacionalidad del estudiante', 'placeholder' => 'Ecuador', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('genero', 'Género', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('genero') ? ' has-error' : '' }}">
					{!! Form::select('genero', array('M' => 'Masculino', 'F' => 'Femenino'), null, ['class' => 'form-control', 'title' => 'Introduzca la nacionalidad del estudiante', 'placeholder' => 'Seleccione']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('fecha_nacimiento', 'Fecha nacimiento', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
					{!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de nacimiento del estudiante', 'placeholder' => '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('direccion', 'Dirección', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('direccion') ? ' has-error' : '' }}">
					{!! Form::textarea('direccion', null, ['class' => 'form-control', 'title' => 'Introduzca la dirección donde vive el estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="control-group">
				{!! Form::label('codigo_matricula', 'Matrícula', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('codigo_matricula') ? ' has-error' : '' }}">
					{!! Form::text('codigo_matricula', null, ['class' => 'form-control', 'title' => 'Introduzca la matrícula del estudiante', 'placeholder' => '00001961', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('apellido_materno', 'Apellido materno', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
					{!! Form::text('apellido_materno', null, ['class' => 'form-control', 'title' => 'Introduzca el apellido materno del estudiante', 'placeholder' => 'Rangel', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('provincia', 'Provincia', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('provincia') ? ' has-error' : '' }}">
					{!! Form::text('provincia', null, ['class' => 'form-control', 'title' => 'Introduzca la provincia del estudiante', 'placeholder' => 'Sucumbíos', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('estado_actual', 'Estado', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('estado_actual') ? ' has-error' : '' }}">
					{!! Form::select('estado_actual', array('Activo' => 'Activo', 'Inactivo' => 'Inactivo', 'Desertor' => 'Desertor'), null, ['class' => 'form-control', 'title' => 'Introduzca el estado actual del estudiante', 'placeholder' => 'Seleccione']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('telefono', 'Teléfono', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('telefono') ? ' has-error' : '' }}">
					{!! Form::text('telefono', null, ['class' => 'form-control', 'title' => 'Introduzca el número de teléfono del estudiante', 'placeholder' => '',  'id' => 'phone']) !!}
				</div>
			</div>
		</div>
		<div class="span3">
			<div class="control-group">
				{!! Form::label('fecha_registro', 'Fecha de registro', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('fecha_registro') ? ' has-error' : '' }}">
					{!! Form::date('fecha_registro', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de registro del estudiante con el formato (DIA-MES-AÑO)']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('nombres', 'Nombre(s)', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('nombres') ? ' has-error' : '' }}">
					{!! Form::text('nombres', null, ['class' => 'form-control', 'title' => 'Introduzca el nombre del estudiante', 'placeholder' => 'Jesús Eduardo', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('ciudad_natal', 'Ciudad', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('ciudad_natal') ? ' has-error' : '' }}">
					{!! Form::text('ciudad_natal', null, ['class' => 'form-control', 'title' => 'Introduzca la ciudad natal del estudiante', 'placeholder' => 'Nueva Loja', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('tipo_registro', 'Tipo registro', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('tipo_registro') ? ' has-error' : '' }}">
					{!! Form::text('tipo_registro', null, ['class' => 'form-control', 'title' => 'Introduzca el tipo de registro del estudiante', 'placeholder' => 'Normal', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('correo', 'Correo electrónico', ['class' => 'control-label']) !!}
				<div class="controls{{ $errors->has('correo') ? ' has-error' : '' }}">
					{!! Form::email('correo', null, ['class' => 'form-control', 'title' => 'Introduzca el correo del estudiante incluyendo @ejemplo.com', 'placeholder' => 'correo@ejemplo.com']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="tab-pane" id="tab3">
	@include('estudiantes.forms.fields-family')
</div>
<div class="tab-pane" id="tab4">
	@include('estudiantes.forms.fields-family2')
</div>
<div class="tab-pane" id="tab5">
	@include('estudiantes.forms.fields-medic')
</div>

{!! Form::hidden('id_representante', $representante->id) !!}
