const modal = {};
let modalToDisplay = null;

// Retorna um objeto com as propriedades do modal
modal.config = () => {
    return {
        type: "", // INFO, CONFIRM, CUSTOM, ERROR, IMAGEZOOM
        title: "",
        body: "",
        extra1: "",
        extra2: "", // EXCLUIR, DESATIVAR
        callback: () => {},
    };
};

// Exibe o modal com base nas propriedades definidas para o mesmo
modal.show = (cfgModal) => {
    if (modalToDisplay !== null) {
        modalToDisplay.remove();
    }

    modalToDisplay = document.createElement("div");
    let url = "";

    if (cfgModal.type.toUpperCase() !== "CUSTOM") {
        url = `/modals/${cfgModal.type}.html`;
    } else {
        url = `/modals/${cfgModal.body}.html`;
    }

    let request = api.requestArchive(url, "GET");

    request
        .then((res) => {
            modalToDisplay.innerHTML = res;

            $("body").append(modalToDisplay);

            switch (cfgModal.type.toUpperCase()) {
                case "INFO":
                    $(".modal-body").last().append(cfgModal.body);

                    break;

                case "CONFIRM":
                    let text = $("#modal-confirm-text")
                        .text()
                        .replace("[ACAO]", cfgModal.extra2)
                        .replace("[ID]", cfgModal.extra1);
                    $("#modal-confirm-text").text(text);

                    break;

                case "CONFIRMCUSTOM":
                    $("#msgModal").text(cfgModal.body);

                    break;
            }

            if ($("#modal-title").text() == "") {
                $("#modal-title").append(
                    document.createTextNode(cfgModal.title)
                );
            }

            if ($("#modal-btnOk")) {
                $("#modal-btnOk").on("click", cfgModal.callback);
            }

            let modalBootstrap = new bootstrap.Modal(
                document.getElementById("modal-js")
            );

            modalBootstrap.show();
        })
        .catch((err) => {
            modalToDisplay.innerHTML = "";
        });
};

// Fecha o modal
modal.close = () => {
    if (modalToDisplay !== null) {
        modalToDisplay.remove();
    }
};
