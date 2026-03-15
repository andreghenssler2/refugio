function toggleTheme() {

    document.body.classList.toggle("dark");

}
document.addEventListener("DOMContentLoaded", function () {

    let imagemAtual = null;

    document.querySelectorAll(".galeria-img").forEach(img => {

        img.addEventListener("click", function () {

            imagemAtual = this.dataset.id;

            document.getElementById("modalPreview").src = this.src;

            document.getElementById("novoNome").value = this.dataset.arquivo;

            document.getElementById("infoDatas").innerHTML =
                "Criado em: " + this.dataset.criado +
                "<br>Alterado em: " + this.dataset.atualizado;

            new bootstrap.Modal(document.getElementById("modalImagem")).show();

        });

    });


    /* RENOMEAR */

    document.getElementById("btnRenomear").onclick = function () {

        let nome = document.getElementById("novoNome").value;

        fetch("../../api/renomear_imagem.php", {

            method: "POST",

            headers: { 'Content-Type': 'application/json' },

            body: JSON.stringify({

                id: imagemAtual,
                nome: nome

            })

        })
            .then(r => r.json())
            .then(r => {

                if (r.success) {
                    location.reload();
                }

            });

    };


    /* EXCLUIR */

    document.getElementById("btnExcluir").onclick = function () {

        if (!confirm("Deseja excluir esta imagem?")) return;

        fetch("../../api/excluir_imagem.php", {

            method: "POST",

            headers: { 'Content-Type': 'application/json' },

            body: JSON.stringify({

                id: imagemAtual

            })

        })
            .then(r => r.json())
            .then(r => {

                if (r.success) {
                    location.reload();
                }

            });

    };
    let imagens = document.querySelectorAll(".galeria-img");
    let indexAtual = 0;
    let zoom = 1;

    const modal = new bootstrap.Modal(document.getElementById("modalImagem"));
    const preview = document.getElementById("modalPreview");

    /* ABRIR IMAGEM */

    imagens.forEach((img, i) => {

        img.addEventListener("click", function () {

            indexAtual = i;

            abrirImagem();

            modal.show();

        });

    });


    function abrirImagem() {

        let img = imagens[indexAtual];

        preview.src = img.dataset.src;

        document.getElementById("novoNome").value = img.dataset.arquivo;

        document.getElementById("infoDatas").innerHTML =
            "Criado em: " + img.dataset.criado +
            "<br>Alterado em: " + img.dataset.atualizado;

        zoom = 1;
        preview.style.transform = "scale(1)";

    }


    /* NAVEGAÇÃO */

    function proxima() {

        indexAtual++;

        if (indexAtual >= imagens.length)
            indexAtual = 0;

        abrirImagem();

    }

    function anterior() {

        indexAtual--;

        if (indexAtual < 0)
            indexAtual = imagens.length - 1;

        abrirImagem();

    }


    /* BOTÕES */

    document.getElementById("nextImg").onclick = proxima;
    document.getElementById("prevImg").onclick = anterior;


    /* TECLADO */

    document.addEventListener("keydown", function (e) {

        if (!document.body.classList.contains("modal-open")) return;

        if (e.key === "ArrowRight") proxima();

        if (e.key === "ArrowLeft") anterior();

        if (e.key === "Escape") modal.hide();

    });


    /* ZOOM COM SCROLL */

    preview.addEventListener("wheel", function (e) {

        e.preventDefault();

        if (e.deltaY < 0) {
            zoom += 0.1;
        } else {
            zoom -= 0.1;
        }

        zoom = Math.max(1, Math.min(3, zoom));

        preview.style.transform = "scale(" + zoom + ")";

    });


    /* ZOOM CLICK */

    preview.addEventListener("click", function () {

        zoom += 0.5;

        if (zoom > 3) zoom = 1;

        preview.style.transform = "scale(" + zoom + ")";

    });

});
// GALERIA - EXCLUIR IMAGEM COM MODAL BOOTSTRAP

let imagemId = null;

document.addEventListener("DOMContentLoaded", function () {

    // BOTÃO EXCLUIR
    document.querySelectorAll(".btn-delete").forEach(function (btn) {

        btn.addEventListener("click", function () {

            imagemId = this.dataset.id;

        });

    });

    // CONFIRMAR EXCLUSÃO
    const confirmDelete = document.getElementById("confirmDelete");

    if (confirmDelete) {

        confirmDelete.addEventListener("click", function () {

            fetch("../../api/delete_imagem.php?id=" + imagemId)

                .then(response => response.json())

                .then(data => {

                    if (data.success) {

                        const card = document.querySelector('.card-img[data-id="' + imagemId + '"]');

                        if (card) {
                            card.remove();
                        }

                    }

                    const modalEl = document.getElementById("deleteModal");

                    const modal = bootstrap.Modal.getInstance(modalEl);

                    if (modal) {
                        modal.hide();
                    }

                });

        });

    }

});

/* ===============================
UPLOAD DRAG AND DROP GALERIA
=============================== */

document.addEventListener("DOMContentLoaded", function () {

    const dropZone = document.getElementById("dropZone");
    const fileInput = document.getElementById("fileInput");

    if (!dropZone) return;


    /* clicar abre seletor */

    dropZone.addEventListener("click", () => {
        fileInput.click();
    });


    /* arrastar */

    dropZone.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZone.classList.add("dragover");
    });


    dropZone.addEventListener("dragleave", () => {
        dropZone.classList.remove("dragover");
    });


    dropZone.addEventListener("drop", (e) => {

        e.preventDefault();
        dropZone.classList.remove("dragover");

        const files = e.dataTransfer.files;

        uploadFiles(files);

    });


    /* upload pelo input */

    fileInput.addEventListener("change", function () {

        uploadFiles(this.files);

    });


    function uploadFiles(files) {

        let formData = new FormData();

        for (let file of files) {
            formData.append("imagens[]", file);
        }

        fetch("../../api/upload_imagem.php", {
            method: "POST",
            body: formData
        })
            .then(r => r.text()) // primeiro texto
            .then(res => {

                try {

                    let json = JSON.parse(res);

                    if (json.success) {
                        location.reload();
                    } else {
                        alert(json.msg || "Erro no upload");
                    }

                } catch (e) {

                    console.error(res);
                    alert("Erro no upload");

                }

            });

    }

});