function btnDelConfirm(e, clickedForm){
    e.preventDefault();
    that = this;
    $.confirm({
        title: '',
        content: 'Deseja realmente deletar?',
        buttons: {
            Sim: function () {
                clickedForm.submit();
            },
            Não: function () {
            },
        }
    });
}