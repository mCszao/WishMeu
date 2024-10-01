<?php $render('styleBaseAddForm'); ?>
<h2 class="sub_wo">Item</h2>
<form method="POST" action="<?=$base.'/'.$keyword.'/'.$endpoint?>">
    <div>
        <input type="text" name="name" id="name" placeholder="Nome" value="<?=$name?>"/>
        <label for="name">Nome</label>
    </div>
    <div>
        <input type="text" name="observations" id="observations" placeholder="Observações" value="<?=$obs?>"/>
        <label for="observations">Observações</label>
    </div>
    <div>
        <select name="categorie" id="categorie">
            <?php foreach ($listCategorie as $cat): ?>
                <option value="<?=$cat['id']?>" <?=(($selectedCat != '') && $cat['id'] == $selectedCat) ? 'selected' : ''?> ><?=$cat['name']?></option>
            <?php endforeach; ?>  
        </select>
    </div>
    <input type="submit" value="<?=(str_contains($endpoint,"edit") ) ? "Atualizar" : "Adicionar" ?>">
</form>
<?php $render('baseList', ['list' => $list, 'keyword' => $keyword, 'keywordPT' => $keywordPT]);