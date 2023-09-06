@extends('admin.admin')

@section('title', $option->exists ? "Editer une option" : "Creer une option")

@section('content')

    <h1>@yield('title')</h1>

    <form action="{{route($option->exists ? 'admin.option.update' : 'admin.option.store', $option)}}" method="post" class="vstack gap-2">
        @csrf
        @method($option->exists ? 'put' : 'post')

        @include('shared.input', ['name'=>'name', 'label' => 'Nom', 'value'=> $option->name])

        <div>
            <button class="btn btn-primary mt-3">
                @if($option->exists)
                    Modifier
                @else
                    Creer
                @endif
            </button>
        </div>
    </form>
@endsection
