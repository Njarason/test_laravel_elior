@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <form class="card p-3 bg-white shadow  w-50"  action="{{ route('new-client') }}" method="post">
        @csrf
        <div class="w-100 my-1 d-flex justify-content-center">
        <label for="client"
                    class="client-text-title color-heading font-medium mb-2">Nouveau client</label>
        </div>
        <div class="row mb-25">
            <div class="col-md-6">
               <div>
                <label for="client"
                    class="client-text-title color-heading font-medium mb-2">Nom du client</label>
               </div>
               <div>
               <input id="client" type="text" name="client" value="{{ old('client') }}"
                    class="form-control" placeholder="nom">
                @error('client')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div>
                <label for="statut"
                    class="label-text-title color-heading font-medium mb-2">Statut</label>
               </div>
               <div>
                <select id="statut" type="text" name="statut" value="{{ old('statut') }}"
                    class="form-control">
                    <option value="VIP">VIP</option>
                    <option value="Privilégié">Privilégié</option>
                    <option value="Standard">Standard</option>
                </select>
               </div>
            </div>
            <div class="col-md-6">
               <div>
                <label for="whatsapp"
                    class="label-text-title color-heading font-medium mb-2">Whatsapp</label>
               </div>
               <div>
               <input id="whatsapp" type="text" name="whatsapp" value="{{ old('whatsapp') }}"
                    class="form-control" placeholder="whatsapp">
                @error('whatsapp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div>
                <label for="contact"
                    class="label-text-title color-heading font-medium mb-2">Contact</label>
               </div>
               <div>
               <input id="contact" type="text" name="contact" value="{{ old('contact') }}"
                    class="form-control" placeholder="Contact">
                @error('contact')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div>
                <label for="email"
                    class="label-text-title color-heading font-medium mb-2">Email</label>
               </div>
               <div>
               <input id="email" type="text" name="email" value="{{ old('email') }}"
                    class="form-control" placeholder="Email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div>
                <label for="adresse"
                class="label-text-title color-heading font-medium mb-2">Adress</label>
               </div>
               <div>
               <input id="adresse" type="text" name="adresse" value="{{ old('adresse') }}"
                    class="form-control" placeholder="Adresse">
                @error('adresse')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
            </div>
            <div class="d-flex justify-content-end mt-3  w-100">
                <a href="/client/client" style="margin-right: 10px" class="btn btn-secondary bg-secondary" type="submit">Annuler</a>
                <button class="btn btn-primary bg-primary" type="submit">Enregistrer</button>
            </div>
    </form>
</div>
@endsection