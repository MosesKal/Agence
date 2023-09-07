@extends('base')

@section('title', $property->title)


@section('content')

    <div class="container">
        <h1>{{ $property->title}}</h1>
        <h2>{{ $property->rooms}} pieces - {{$property->surface}}m²</h2>
    
        <div class="text-primary fw-bold h2">
            {{number_format($property->price, thousands_separator : ' ')}} $
        </div>
    
        <div class="mt-4">
            <h4>Interesse par ce bien ? </h4>
    
            <form action="{{route('property.contact', $property)}}" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include("shared.input", ['class'=> 'col','name'=>'firstname', 'label'=> 'Prenom', 'value' => 'dev']) 
                    @include("shared.input", ['class'=> 'col','name'=>'lastname', 'label'=> 'Nom', 'value' => 'Moses']) 
                </div>
    
                <div class="row">
                    @include("shared.input", ['class'=> 'col','name'=>'phone', 'label'=> 'Telephone', 'value'=> '0992422969']) 
                    @include("shared.input", ['type'=> 'email', 'class'=>'col','name'=>'email', 'label'=> 'Email', 'value'=>'mosesziongo@gmail.com']) 
                </div>
                @include("shared.input", ['type'=> 'textarea', 'class'=>'col','name'=>'message', 'label'=> 'votre message', 'value'=>'text description']) 
                <div class="mt-3">
                    <button class="btn btn-primary">Nous contacter</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <p>{{nl2br($property->description)}}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caracteristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{$property->surface}}m²</td>
                        </tr>
                        <tr>
                            <td>Piece</td>
                            <td>{{$property->rooms}}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{$property->bedrooms}}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{$property->floor ?: 'Rez de chausse'}}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{$property->address}} <br> 
                                {{$property->city ?: 'Rez de chausse'}}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Specificites</h2>
                    <ul class="list-group">
                        @foreach($property->options as $option)
                            <li class="list-group-item">{{$option->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection