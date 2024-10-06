
<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addnewModalLabel">DETAILS DE LA PASSATION</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <h5 class="modal-title" id="addnewModalLabel"> DETAILS DE LA PASSATION</h5>

                {{-- {!! Form::open(['url' => 'save']) !!}
                    <div class="mb-3">
                        {!! Form::label('firstname', 'Firstname') !!}
                        {!! Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'Input Firstname', 'required']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('lastname', 'Lastname') !!}
                        {!! Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Input Lastname', 'required']) !!}
                    </div> --}}


                    <h5 class="text-center">Code passation : {{ $ActivitpassAttentes->code_activite }}  </h5>

                    <h5 class="text-center">Libell&eacute; de la passation :</h5>

                        <h5>{{ $ActivitpassAttentes->libelle_activite }}</h5>


                    <h5 class="text-center"> {{ $ActivitpassAttentes->description }} </h5>


                    <h5 class="text-center">{{ $ActivitpassAttentes->libpasst }}</h5>



                    <h5 class="text-center">{{ $ActivitpassAttentes->pourcen_travail_eff }}</h5>


                   <h5 class="text-center"> {{ $ActivitpassAttentes->matrcl }} </h5>


                   <h5 class="text-center">  {{ $ActivitpassAttentes->nam }} </h5>


                   <h5 class="text-center"> {{ $ActivitpassAttentes->renam }} </h5>

                   <h5 class="text-center">{{ $ActivitpassAttentes->eml }}

                    <h5 class="text-center"> {{ $ActivitpassAttentes->datedmd }}


                        <h5 class="text-center">{{ $ActivitpassAttentes->date_deb }}</h5>


                    {{ $ActivitpassAttentes->datefin }}


                    {{ $ActivitpassAttentes->etatpassman }}



        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Retour</button>

            {{-- {!! Form::close() !!} --}}
        </div>
    </div>
  </div>
</div>






