  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Modification d'une Formations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/backend">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/backend/formations">Liste Formations</a></li>
              <li class="breadcrumb-item active">Modifier Formation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  src="{{asset('assets/images/formations')}}/{{$image}}"
                       alt="formation image">
                </div>

                <h3 class="profile-username text-center">{{$titre}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Lien Wiki</b> 
                    <a class="float-right" href="{{$lien_wiki}}">{{$lien_wiki}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Autre info</b> <a class="float-right">*****</a>
                  </li>
                  <li class="list-group-item">
                    <b>Autre info</b> <a class="float-right">*****</a>
                  </li>
                </ul>

                <a href="{{route('backend.formations.edit',['id_formation'=>$id_formation])}}" class="btn btn-warning btn-block"><b>Modifier</b></a>
                <a href="#" onclick="confirm('Voulez Vous vraiment supprimer cet formation ?')|| event.stopImmediatePropagation()" 
                wire:click.prevent="deleteFormation({{$id_formation}})" class="btn btn-danger btn-block"><b>Supprimer</b></a>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Plus d'infos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Déscription</strong>

                <p class="text-muted">
                {{$description}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Notes</strong>

                <p class="text-muted">{{$notes}} </p>

                <hr>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Réservations</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Tab 2</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Tab 3</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="tab1">
                   
                  
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab2">
                 
                  
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab3">
                    
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


   
  </div>