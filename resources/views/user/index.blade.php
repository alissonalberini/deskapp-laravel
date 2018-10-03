@extends('layouts.app')

@section('content')

<!-- Responsive tables Start -->
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue">Listagem padrão laravel</h4>
            <p></p>
        </div>
        <div class="pull-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm scroll-click" role="button"><i class="fa fa-plus"></i> {{ __('New User') }}</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">{{ __('Actions') }}</th>
                    <th scope="col">{{ __('ID') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Updated_at') }}</th>
                    <th scope="col">{{ __('Situation') }}</th>
                </tr>
            </thead>
            <tbody>
                @isset($records)
                    @forelse ($records as $record)
                    <tr>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left">
                                    <a class="dropdown-item" href="{{ route('users.show', $record->id ) }}"><i class="fa fa-eye"></i> View</a>
                                    <a class="dropdown-item" href="{{ route('users.edit', $record->id ) }}"><i class="fa fa-pencil"></i> Edit</a>
                                    <form method="POST" action="{{ route('users.destroy', $record->id ) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="dropdown-item" type="submit" id="delete"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                       <th scope="row">{{ $record->id }}</th>
                       <td>{{ $record->name }}</td>
                       <td>{{ $record->email }}</td>
                       <td>{{ $record->updated_at }}</td>
                       <td><span class="badge badge-primary">Primary</span></td>
                    </tr>
                    @empty
                        <tr>
                            <p>No Record</p>
                        </tr>
                    @endforelse
                @endisset 
            </tbody>
        </table>
        @isset($records)
        {{ $records->links() }}
        @endisset 
    </div>
</div>
<!-- Responsive tables End -->

@endsection
