
<!-- Add Modal -->
<div class="modal fade" id="addne" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addnewModalLabel">DETAILS DE LA PASSATION</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

              <h5 class="modal-title" id="addnewModalLabel"> DETAILS</h5>

                  {{-- {!! Form::open(['url' => 'save']) !!}
                      <div class="mb-3">
                          {!! Form::label('firstname', 'Firstname') !!}
                          {!! Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'Input Firstname', 'required']) !!}
                      </div>
                      <div class="mb-3">
                          {!! Form::label('lastname', 'Lastname') !!}
                          {!! Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Input Lastname', 'required']) !!}
                      </div> --}}


                      <h5 class="text-center">Code passation : {{ $ActivitpassAttent->code_activite }}  </h5>

                      <h5 class="text-center">libell&eacute; de la passation :</h5>

                          <h5>{{ $ActivitpassAttent->libelle_activite }}</h5>


                      <h5 class="text-center"> {{ $ActivitpassAttent->description }} </h5>


                      <h5 class="text-center">{{ $ActivitpassAttent->libpasst }}</h5>



                      <h5 class="text-center">{{ $ActivitpassAttent->pourcen_travail_eff }}</h5>


                     <h5 class="text-center"> {{ $ActivitpassAttent->matrcl }} </h5>


                     <h5 class="text-center">  {{ $ActivitpassAttent->nam }} </h5>


                     <h5 class="text-center"> {{ $ActivitpassAttent->renam }} </h5>

                     <h5 class="text-center">{{ $ActivitpassAttent->eml }}

                     <h5 class="text-center"> {{ $ActivitpassAttent->datedmd }}


                      <h5 class="text-center">{{ $ActivitpassAttent->date_debut }}</h5>


                      {{ $ActivitpassAttent->date_fin }}


                      {{ $ActivitpassAttent->etatpassman }}



          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>Retour</button>

              {{-- {!! Form::close() !!} --}}
          </div>
      </div>
    </div>
  </div>






