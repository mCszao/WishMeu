<?php $render('header', ['title' => 'Novo item']); ?>

<?php $render('itemForm', ['keyword' => 'item', 'keywordPT' => 'Item', 'listCategorie' => $categories, 'list' => $list, 'name' => $name, 'obs' => $obs, 'selectedCat' => $selectedCat, 'endpoint' => $endpoint, ])?>