function confirm_create_task(formid,inputIds){

    let callbacak = false;

    inputIds.forEach(input => {
        element = document.getElementById(input);
        value = element.value;

        if(value == ''){
            callbacak = true;
            element.classList.add('border');
            element.classList.add('border-danger');
        }else{
            element.classList.remove('border');
            element.classList.remove('border-danger');
        }
    });

    if (callbacak){
        Swal.fire({
            title: 'Atenção!',
            text: 'Faltam campos a serem preenchidos!',
            icon: 'error'
        }).then
    (() => {
        $('#NewTaskModal').modal('show');
    });
    }else{
        Swal.fire({
            title: 'Criando task',
            text: "Tenha certeza de ter digitado valores corretos",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Criar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Task criada com seucesso!',
                    text: 'Sua task foi criada sem erros, você ja pode visuala-la.',
                    icon: 'success'
                }).then(() => {
                    document.getElementById(formid).submit();
                    // window.location.reload();
                });
            }
        });
    }

}

function clear_inputs(inputsIds){
    inputsIds.forEach(element => {
        aux = document.getElementById(element);
        aux.value = ''
    });
}
