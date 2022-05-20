  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajout d'une Formations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/backend">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/backend/formations">Liste Formations</a></li>
              <li class="breadcrumb-item active">Ajouter Formation</li>
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
                <h3 class="card-title">Formulaire Formation</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form wire:submit.prevent="store">
                <div class="card-body">
                  <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" wire:model="titre" class="form-control" placeholder="Titre de Formation">
                    @error('titre') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>

                    <textarea wire:model="description" class="form-control" id="description" placeholder="Description de Formation"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="lien_wiki">Lien Wiki</label>
                    <input wire:model="lien_wiki" type="text" class="form-control" id="lien_wiki" placeholder="Lien Wiki">
                  </div>

                  <div class="form-group">
                    <label for="image">Image de Formation</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input wire:model="image" type="file" accept="image/*"  class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image">Séléctionner Une Image</label>
                       
                      </div>
                     
                    </div>
                    <div> @error('image') <div> <span class="text-danger">{{ $message }}</span></div> @enderror
                      @if($image)
                      <div>  <img src="{{$image->temporaryURL()}}" alt="Image" width="120"></div>
                      @endif
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="notes">Notes</label>

                    <textarea wire:model="notes" class="form-control" id="notes" placeholder="notes de Formation"></textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('backend.formations')}}" type="button" class="btn btn-primary">Annuler</a>
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