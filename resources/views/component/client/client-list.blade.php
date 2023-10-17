@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="mt-3 justify-content-center">
    <table class="table">
            <thead>
                <th class="bg-secondary text-white pl-3">Client</th>
                <th class="bg-secondary text-white  pl-3">STATUT</th>
                <th class="bg-secondary text-white  pl-3">CONTACT</th>
                <th class="bg-secondary text-white  pl-3">WHATSAPP</th>
                <th class="bg-secondary text-white  pl-3">EMAIL</th>
                <th class="bg-secondary text-white  pl-3">ADRESSE</th>
                <th class="bg-secondary text-white  pl-3"> 
                    <div class="row">
                        <div class="col-6 d-flex justify-content-end">
                            <span class="text-white">Trier Par</span>
                        </div>
                        <div class="col-6">
                            <select  id="filtre" type="text" name="statut"
                                class="form-control">
                                <option value="client">client</option>
                                <option value="statut">statut</option>
                                <option value="contact">contact</option>
                                <option value="whatsapp">whatsapp</option>
                                <option value="email">email</option>
                                <option value="adresse">adresse</option>
                            </select>
                        </div>
                    </div>
                </th>
            </thead>
            <tbody>
                @foreach($data as $client)
                    <tr>
                    <td>{{ $client['client'] }}</td>
                    <td>{{ $client['statut'] }}</td>
                    <td>{{ $client['contact'] }}</td>
                    <td>{{ $client['whatsapp'] }}</td>
                    <td>{{ $client['email'] }}</td>
                    <td>{{ $client['adresse'] }}</td>
                    <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
