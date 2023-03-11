document.addEventListener('DOMContentLoaded', () => {
    new TypeIt(".cadastro", {
        speed: 100,
        loop: false
    }) 
    .type('Cadatre-se', {delay: 300})
    .move(-6)
    .type('s')
    .move(6)
    .delete(11)
    .type('Cadastrre-se', {delay: 300})
    .move(-4)
    .delete(1)
    .move(4)
    .delete(11)
    .type('Cadastrese', {delay: 300})
    .move(-2)
    .type('-', {delay: 500})
    .move(2)
    .type(' ✔ ')
    .go()
   
});

document.addEventListener('DOMContentLoaded', () => {
    new TypeIt(".login", {
        speed: 100
    }) 
    .type('Enttrar', {delay: 300})
    .move(-3)
    .delete(1)
    .move(6)
    .delete(7)
    .type('Entrrr', {delay: 300})
    .move(-1)
    .delete(1)
    .type('a')
    .move(1)
    .delete(7)
    .type('entrar', {delay: 300})
    .move(-5)
    .delete(1)
    .type('E')
    .move(6)
    .type(' ✔ ')
    .go()
   
})