const modal = {};
let modalToDisplay = null

<<<<<<< HEAD
// Retorna um objeto com as propriedades do modal
=======
// Retorna um objeto com as propriedades do modal
>>>>>>> 2e19aca1cf5d46be42c7061640586b69f4807ee8
modal.config = () => {
    return {
        type: "", // INFO, CONFIRM, CUSTOM, ERROR, IMAGEZOOM
        title: "",
        body: "",
<<<<<<< HEAD
        extra1: "",
=======
        extra1: "",
>>>>>>> 2e19aca1cf5d46be42c7061640586b69f4807ee8
        extra2: "", // EXCLUIR, DESATIVAR
        callback: () => {}
    };
}

// Exibe o modal com base nas propriedades definidas para o mesmo
modal.show = (cfgModal) => {
    if (modalToDisplay !== null){
        modalToDisplay.remove();
    }

    modalToDisplay = document.createElement("div");
    let url = ""

    if(cfgModal.type.toUpperCase() !== "CUSTOM"){
        url = `/modals/${cfgModal.type}.html`;
    } else{
        url = `/modals/${cfgModal.body}.html`
    }
<<<<<<< HEAD

=======

>>>>>>> 2e19aca1cf5d46be42c7061640586b69f4807ee8
    let request = api.requestArchive(url, "GET");

    request
        .then((res) => {
            modalToDisplay.innerHTML = res;

            $("body").append(modalToDisplay);

            switch (cfgModal.type.toUpperCase()) {
                case "INFO":
                    $(".modal-body").last().append(cfgModal.body);

                    break;
<<<<<<< HEAD

                case "CONFIRM":
=======

                case "CONFIRM":
>>>>>>> 2e19aca1cf5d46be42c7061640586b69f4807ee8
                    let text = $("#modal-confirm-text").text().replace("[ACAO]", cfgModal.extra2).replace("[ID]", cfgModal.extra1);
                    $("#modal-confirm-text").text(text);

                    break;

                case "CONFIRMCUSTOM":
                    $("#msgModal").text(cfgModal.body);

                    break;
            }

<<<<<<< HEAD

=======

>>>>>>> 2e19aca1cf5d46be42c7061640586b69f4807ee8
            if($("#modal-title").text() == ""){
                $("#modal-title").append(document.createTextNode(cfgModal.title));
            }

            if($("#modal-btnOk")){
                $("#modal-btnOk").on("click", cfgModal.callback);
            }

            let modalBootstrap = new bootstrap.Modal(document.getElementById("modal-js"));

            modalBootstrap.show();
        })
        .catch((err) => {
            modalToDisplay.innerHTML = "";
        });
}

// Fecha o modal
modal.close = () => {
    if (modalToDisplay !== null){
        modalToDisplay.remove();
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 2e19aca1cf5d46be42c7061640586b69f4807ee8
