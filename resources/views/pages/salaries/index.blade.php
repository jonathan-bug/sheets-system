@extends('layouts.main')
@section('title', 'Salarios')

@section('content')
    @include('partials.navbar', ['active' => 'employees'])
    <div class='container pt-4'>
        @component('components.breadcrumb')
            <li class='breadcrumb-item'>
                <a href='{{route('dashboard')}}'>Inicio</a>
            </li>
            <li class='breadcrumb-item'>
                <a href='{{route('employees')}}'>Empleados</a>
            </li>
            <li class='breadcrumb-item active'>Salarios</li>
        @endcomponent
        
        <div class='row'>
            <div class='col-6'>
                <h4>Salarios</h4>
            </div>
            <div class='col-6 d-flex justify-content-end gap-2'>
                <a class='btn btn-success' href='{{route('salaries.insert', $dui)}}'>
                    <li class='fa fa-plus'></li>
                    Nuevo
                </a>
                <a class='btn btn-secondary' href='{{route('employees')}}'>Volver</a>
            </div>

            <div class='col-12 mt-4'>
                <table class='table table-striped table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Monto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salaries as $salary)
                            <tr>
                                <td>{{$salary->id}}</td>
                                <td>{{$salary->salary}}</td>
                                <td class='d-flex justify-content-end gap-2'>
                                    <form
                                        action='{{route('api.salaries.delete', $salary->id)}}'
                                        method='post'>
                                        @csrf
                                        @method('delete')
                                        <button class='btn btn-danger'>
                                            <li class='fa fa-trash'></li>
                                        </button>
                                    </form>
                                    <a class='btn btn-warning' href='{{route('salaries.update', $salary->id)}}'>
                                        <li class='fa fa-edit'></li>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$salaries->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
@endsection