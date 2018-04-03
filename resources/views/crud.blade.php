@extends('app')
@section('title', 'Crud')
@section('content')
	<div id="crud" class="row">
		<div class="col-md-12">
			<h1 class="page-header">CRUD LARAVEL Y VUEjs</h1>
		</div>
		<div class="col-sm-7">
			<a href="" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#CrearUsuario">Nuevo usuario</a><hr>
			<table class="table table-dark">
				<thead>
					<tr>
						<th width="3px">Id</th>
						<th>Nombre</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="user in users">
						<th>@{{ user.id}}</th>
						<td>@{{ user.nombre}}</td>
						<td width="10px"> <a href="" class="btn btn-warning btn-sm" v-on:click.prevent="editarUsuario(user)">Editar</a></td>
						<td width="10px"> <a href="" class="btn btn-danger btn-sm" v-on:click.prevent="eliminarUsuario(user)">Eliminar</a></td>
					</tr>
				</tbody>
			</table>				
		</div>
		<div class="col-sm-5">
			<pre>
					@{{ $data }}
			</pre>	
		</div>
		
		@include('createUser')
		@include('editUser')
	</div>
@endsection()