<div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Liste Adherents</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/backend">Dashboard</a></li>
                        <li class="breadcrumb-item active">Liste Adherents</li>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Adherents</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <a href="{{route('backend.adherents.add')}}" type="button" class="btn btn-info btn-block btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Message</h5>
                                {{ session('message') }}
                            </div>
                            @endif

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>

                                    <tr>

                                        <th>Numero Adherent</th>
                                        <th>Nom & Prénom</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Actions</th>

                                    </tr>




                                </thead>
                                <tbody>

                                    @foreach ($items as $item)

                                    <tr>
                                        <td>{{$item->numero_adherent}}</td>

                                        <td><a href="{{route('backend.adherents.show',['id_adherent'=>$item->id])}}">{{$item->nom}} {{$item->prenom}}</a></td>

                                        <td>{{$item->telephone}}</td>
                                        <td>{{$item->email}}</td>
                                     
                                        <td >
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Actions </button>

                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{route('backend.adherents.show',['id_adherent'=>$item->id])}}"> <i class="fas fa-folder">
                                                        </i>
                                                        Consulter</a>
                                                    <a href="{{route('backend.adherents.edit',['id_adherent'=>$item->id])}}" class="dropdown-item"> <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Modifier</a>

                                                    <a class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment supprimer cet adherent ?')|| event.stopImmediatePropagation()" wire:click.prevent="deleteAdherent({{$item->id}})">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Supprimer</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Réservations</a>
                                                    <a class="dropdown-item" href="#">Inscriptions</a>
                                                    <a class="dropdown-item" href="#">Participations</a>
                                                </div>
                                            </div>



                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="d-flex justify-content-center flex-nowrap">
                    
                    {{$items->links()}}

                    </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>