import Swal from 'sweetalert2';

document.querySelectorAll('.btn-excluir').forEach(button => {
    button.addEventListener('click', function() {
        const form = this.closest('form');
        const nome = this.dataset.nome;

        if (nome)
            Swal.fire({
                title: `Deseja excluir "${nome}"?`,
                text: "Você não poderá reverter isso!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim",
                cancelButtonText: "Não"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        "Excluído!",
                        `"${nome}" foi excluído com sucesso.`,
                        "success"
                    ).then(() => {
                        form.submit();
                    });
                }
            });
        else
            Swal.fire({
                title: "Deseja excluir?",
                text: "Você não poderá reverter isso!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim",
                cancelButtonText: "Não"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        "Excluído!",
                        "Excluído com sucesso.",
                        "success"
                    ).then(() => {
                        form.submit();
                    });
                }
            });
    });
});
