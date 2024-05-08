<?php $render('header', ['title' => 'Novo item']); ?>

<style>
    form {
        display: flex;
        gap: 0.5rem; 
        flex-direction: column
    }
</style>
<h2>Item</h2>

<?php $render('itemForm', ['keyword' => 'item', 'keywordPT' => 'Item', 'list' => $categories])?>