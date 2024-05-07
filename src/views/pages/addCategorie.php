<?php $render('header', ['title' => 'Nova categoria']); ?>

<style>
    form {
        display: flex;
        gap: 0.5rem; 
        flex-direction: column
    }
</style>
<h2>Categoria</h2>

<?php $render('baseForm', ['keyword' => 'categorie', 'keywordPT' => 'Categoria'])?>