
<!-- Acceptation de la passation Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Demande de cong&eacute;</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="{{ route('mescongervalid.valid', $CongesDAtt->id_p ) }}" method="POST">
            @csrf
            @method('PUT')
          <div class="modal-body">




                  <h4 class="text-center">Voulez-vous accepter la demande de cong&eacute; ?</h4>
                  {{-- <h5 class="text-center">Code passation : {{ $ActivitpassAttentes->code_activite}} {{  $ActivitpassAttentes->idpasst }}</h5> --}}
          </div>
          <div class="modal-footer justify-content-center">





              <button type="button" class="flex tw-items-center btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Retour</button>
              {{-- {{Form::button('<i class="fa fa-trash"></i> Valider', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
              {!! Form::close() !!} --}}


              <button type="submit" class="flex tw-items-center  tw-text-white hover:tw-bg-gray-100 hover:tw-text-green-800 tw-border hover:tw-border-green-700 tw-bg-green-700 tw-bg-white-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-green-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-green-500 dark:tw-text-green-500 dark:hover:tw-text-white dark:hover:tw-bg-green-600 dark:focus:tw-ring-green-900">

                Accepter</button>


                </div>
          </form>


      </div>
    </div>
  </div>


