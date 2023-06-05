const api = {};

let protocol = window.location.protocol;
let host = window.location.hostname;
let port = window.location.port && window.location.port != '' ? ':' + window.location.port : '';
let urlBase = `${protocol}//${host}${port}`;
let urlApi = `${urlBase}/api`;

// Realiza uma requisição de um arquivo do projeto sem retornar um conjunto de dados
api.request = (url, method, data, notInternal) => {
    url =  notInternal ? url : `${urlApi}${url}`;

    const promisse = new Promise((resolve, reject) => {
        $.ajax({
            url: url,
            type: method,
            data: data,
            processData: false,
            contentType: false,
            headers: {
                'Content-Type': 'application/json'
            },
            success: (res) => {
                if (res === undefined) {
                    reject(res);
                    return;
                }

                resolve(res);
                return;
            },
            error: (req) => {
                reject({
                    title: "Erro inesperado",
                    message: "Tente novamente mais tarde. Caso o erro persista, entre em contato com o administrador do seu sistema.",
                    req: req,
                    items: []
                });
            }
        })
    });

    return promisse;
};

api.requestArchive = (url, method, data) => {
    let errorModel = {
        status: 500,
        title: "Erro inesperado",
        message: "Tente novamente mais tarde. Caso o erro persista, entre em contato com o administrador do seu sistema.",
        items: []
    };

    const promisse = new Promise((resolve, reject) => {
        $.ajax({
            url: `${urlBase}${url}`,
            type: method,
            data: data,
            success: (res) => {
                if (res === undefined) {
                    reject(errorModel);
                    return;
                }

                if (res !== "") {
                    resolve(res);
                    return;
                }

                reject(errorModel);
            },
            error: (request) => {
                reject(errorModel);
            }
        })
    });

    return promisse;
};
