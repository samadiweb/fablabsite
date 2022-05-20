<div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Liste Projects</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/backend">Dashboard</a></li>
                        <li class="breadcrumb-item active">Liste Projects</li>
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
                            <h3 class="card-title">Liste des Projects</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <a href="{{route('backend.projects.add')}}" type="button" class="btn btn-info btn-block btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
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

                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Lien Wiki</th>
                                        <th>Actions</th>

                                    </tr>




                                </thead>
                                <tbody>

                                    @foreach ($items as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><img src="{{ asset('assets/images/projects') }}/{{$item->image}}" width="60" alt="{{$item->titre}}"></td>

                                        <td><a href="{{route('backend.projects.show',['id_project'=>$item->id])}}">{{$item->titre}}</a></td>
                                        <td>
                                        <a  href="{{$item->lien_wiki}}">{{$item->lien_wiki}}</a>
                                        </td>
                                        <td >
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Actions </button>

                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{route('backend.projects.show',['id_project'=>$item->id])}}"> <i class="fas fa-folder">
                                                        </i>
                                                        Consulter</a>
                                                    <a href="{{route('backend.projects.edit',['id_project'=>$item->id])}}" class="dropdown-item"> <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Modifier</a>

                                                    <a class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment supprimer cet project ?')|| event.stopImmediatePropagation()" wire:click.prevent="deleteProject({{$item->id}})">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Supprimer</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Inscriptions</a>
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