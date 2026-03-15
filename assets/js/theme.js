function toggleTheme() {

    document.body.classList.toggle("dark");

}

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