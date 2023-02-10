function adicionarClasse (status) {

    // let selector;

    // if(status === 'reprovado') selector = 'aprovado';

    // if(status === 'aprovado') selector = 'reprovado'


    const cards = document.querySelectorAll('.full-card');

    cards.forEach(item => {
        const card = item.querySelector('.card');
        if (!card.classList.contains(status)) {
        item.classList.toggle('d-none');
      }
    });
  };
