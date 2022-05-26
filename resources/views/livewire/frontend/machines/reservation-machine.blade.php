<style>
	table {
    display: block;
    max-width: -moz-fit-content;
    max-width: fit-content;
    margin: 0 auto;
    overflow-x: auto;
    white-space: nowrap;
}
</style>
<div>
<section class="page-title bg-1">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block text-center">
					<span class="text-white">Cohabit - Fablab</span>
					<h1 class="text-capitalize mb-5 text-lg">Détails Machine</h1>

				</div>
			</div>
		</div>
	</div>
</section>


<section class="section doctor-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="doctor-img-block">
					<img src="{{ asset('assets/images/machines') }}/{{$image}}" alt="" class="img-fluid w-100">

					<div class="info-block mt-4">
						<h4 class="mb-0">{{$nom}}</h4>

					</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-6">
				<div class="doctor-details mt-4 mt-lg-0">
					<h2 class="text-md">{{$nom}}</h2>
					<div class="divider my-4"></div>
					<p>Texte descriptif</p>
					<p>Pour plus de détails, consulter le wiki : <a href="{{$lien_wiki}}">{{$lien_wiki}}</a> </p>

				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="text-md mb-2">Table de Réservation</h2>
									</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 mb-2">
				Projet de réservation : <input wire:model="project" type="text" size="50">
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<table class="table table-bordered">
					<thead>
						<tr style="background-color: #B9D210;">
							<th>Jour/Horaire</th>
							<th>10h00-11h00</th>
							<th>11h00-12h00</th>
							<th>12h00-13h00</th>
							<th>13h00-14h00</th>
							<th>14h00-15h00</th>
							<th>15h00-16h00</th>
							<th>16h00-17h00</th>
							<th>17h00-18h00</th>
						</tr>
					</thead>
					<tbody>
						@foreach($reservation_array as $reserve)

						<tr wire:key="{{ $loop->index }}">
							<td style="background-color:#B9D210;">
								{{ $reserve['date']}}
							</td>
							@foreach($reserve['seances'] as $seance)

							@if($seance['disponible']==true)
							<td  >
								<button wire:click.prevent="test" type="button" class="btn btn-success btn-sm">Réserver</button>
							</td>
							@else
							<td style="background-color:{{$seance['color']}}" wire:click="selectSeance()">
							{{$seance['date']}} - {{$seance['time']}}
							</td>
							@endif
							@endforeach

						</tr>

						@endforeach 
					</tbody>
				</table>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 mb-2">
				Notes : <input wire:model="notes_reservation" value="{{$notes_reservation}}" type="text" size="50">
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 mb-2">
				<button wire:click.prevent="test" type="button" class="btn btn-info" >Valider la réservation</button>
			</div>
			<div>
				<?php
				//print_r($reservation_array);
				?>
			</div>
		</div>
	</div>
</section>


</div>