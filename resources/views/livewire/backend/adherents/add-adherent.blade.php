  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajout d'un Adherent</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/backend">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="/backend/adherents">Liste Adherents</a></li>
              <li class="breadcrumb-item active">Ajouter Adherent</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulaire Adherent</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form wire:submit.prevent="store">
                <div class="card-body">
                  <div class="form-group">
                    <label for="numero_adherent">Numéro Adherent</label>
                    <input type="text" wire:model="numero_adherent" class="form-control" placeholder="Numéro Adherent">
                    @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" wire:model="nom" class="form-control" placeholder="Nom Adherent">
                    @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prénom</label>

                    <textarea wire:model="prenom" class="form-control" id="prenom" placeholder="Prénom  Adherent"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input wire:model="telephone" type="text" class="form-control" id="telephone" placeholder="Téléphone">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input wire:model="password" type="password" class="form-control" id="password" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <label for="confirmation_password">Confirmation Password</label>
                    <input wire:model="confirmation_password" type="password" class="form-control" id="confirmation_password" placeholder="Confirmation Password">
                  </div>

                  
                 

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('backend.adherents')}}" type="button" class="btn btn-primary">Annuler</a>
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>