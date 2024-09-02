

<div class="modal fade" id="editbrefus" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Refuser la passation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="{{ route('mespassationback.refus', $ActivitpassAttent->idpasst) }}" method="POST">
            @csrf
            @method('PUT')

          <div class="modal-body">

                  <h4 class="text-center">Etre vous sure de refuser la passation ?</h4>
                  <h5 class="text-center">Code passation : {{$ActivitpassAttent->code_activite }} </h5>

          </div>

          <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Retour</button>
              {{-- {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}} --}}
              {{-- {!! Form::close() !!} --}}

              <button class="flex tw-items-center tw-text-white hover:tw-text-red-700 hover:tw-bg-gray-100 tw-border hover:tw-border-red-700 tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-red-500 dark:tw-text-red-500 dark:hover:tw-text-white dark:hover:tw-bg-red-600 dark:focus:tw-ring-red-900"> Refuser</button>


          </div>

        </form>
      </div>
    </div>
  </div>
