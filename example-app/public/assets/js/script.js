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

function delete_task(formid){
    Swal.fire({
        title: 'Deketando Tarefa',
        text: "Tenha certeza de que quer deletar sua tarefa? essa ação não pode ser revertida",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, Deletar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Tarefa deletada com seucesso!',
                text: 'Sua tarefa foi deletada sem erros',
                icon: 'success'
            }).then(() => {
                // document.getElementById(formid).submit();
            });
        }
    });
}

async function confirm_regeistration(formid,inputIds){

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
        });
    }else{
        email = document.getElementById('email-input');

        if (!email.value.includes('@')) {
            email.classList.add('border');
            email.classList.add('border-danger');

            Swal.fire({
                title: 'Email inválido',
                text: 'O email fornecido não é válido',
                icon: 'error'
            });
        }else{
            let emailExists = await api_verify_unique_email_exists(email.value);
            console.log(emailExists);
            if(emailExists){
                email.classList.add('border');
                email.classList.add('border-danger');

                Swal.fire({
                    title: 'Email Já exite',
                    text: 'O email fornecido já exite',
                    icon: 'error'
                });
            }else{
                senha_1 = document.getElementById('senha-input');
                senha_2 = document.getElementById('senha-input-confirm');

                if (senha_1.value == senha_2.value){
                    Swal.fire({
                        title: 'Conta criada com seucesso!',
                        text: 'Sua conta ja esta disponivel para ser acessada',
                        icon: 'success'
                    }).then(() => {
                        document.getElementById(formid).submit();
                    });
                }else{
                    senha_1.classList.add('border');
                    senha_1.classList.add('border-danger');

                    senha_2.classList.add('border');
                    senha_2.classList.add('border-danger');

                    Swal.fire({
                        title: 'Senhas não coincidem',
                        text: 'As senhas fornecidas são diferentes',
                        icon: 'error'
                    });
                }
            }
        }
    }
}

async function api_verify_unique_email_exists(email) {
    url = 'http://127.0.0.1:8000/api/verify_unique_email/'
    let options = {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    };

    url += email;

    return fetch(url, options)
        .then(response => response.json())
        .then(data => {
            // Swal.fire({
            //     title: 'Consulta feita com sucesso',
            //     text: `email: ${data}`,
            //     icon: 'success'
            // });
            console.log(url);
            console.log(data['exist']);
            return data;
        })
        .catch((error) => {
            Swal.fire({
                title: 'Não foi possivel fazer a consulta de email',
                text: `Erro: ${error.message}`,
                icon: 'error'
            });
        });
}

