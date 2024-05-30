<?php $render('header', ['title' => $title]); ?>
<?php $render('styleBaseAddForm'); ?>
<h2 class="sub_wo"><?=$keywordPT?></h2>
<form method="POST" action="<?=$base.'/'.$keyword.'/'.$endpoint?>">
    <div>
        <input type="text" name="name" id="name" placeholder="Nome" value="<?=$name?>"/>
        <label for="name">Nome</label>
    </div>
    <div>
        <input type="text" name="desc" id="desc" placeholder="Descrição"value="<?=$desc?>"/>
        <label for="desc">Descrição</label>
    </div>
    <input type="submit" value="Adicionar">
</form>

<?php $render('baseList', ['list' => $list, 'keyword' => $keyword]);