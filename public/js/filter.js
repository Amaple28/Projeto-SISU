const cards = document.querySelectorAll('.full-card');
const filtros = document.querySelectorAll('.filtro')

function adicionarClasse(status) {
    cards.forEach(item => {
        const card = item.querySelector('.card');
        if (!card.classList.contains(status)) {
            item.classList.toggle('d-none');
        }
    });
};

function verifyFilterIsActive(element) {
    if (element.classList.contains('active_filter')) {
        return true
    }
    return false
}

function clearFilter() {
    filtros.forEach(item => {
        item.classList.remove('active_filter');
    });
    cards.forEach(item => {
        item.classList.remove('d-none');
    });
}



function showAprovadas(element) {
    if (verifyFilterIsActive(element)) {
        clearFilter();
        return
    }

    clearFilter();
    element.classList.add('active_filter');
    adicionarClasse('aprovado');
}

function showReprovadas(element) {
    if (verifyFilterIsActive(element)) {
        clearFilter();
        return
    }
    clearFilter();
    element.classList.toggle('active_filter');
    adicionarClasse('reprovado');
}


