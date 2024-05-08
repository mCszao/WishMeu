<style>
    form {
        display: flex;
        gap: 0.5rem; 
        flex-direction: column;
        align-items: center;
    }

</style>
<form method="POST" action="<?=$base.'/'.$keyword?>/save">
    <div>
        <label for="name">Nome  <?=$keywordPT?>:</label>
        <input type="text" name="name" id="name" />
    </div>
    <div>
        <label for="observations">Observações  <?=$keywordPT?>:</label>
        <input type="text" name="observations" id="observations"/>
    </div>
    <div>
        <label for="categorie">Categoria  <?=$keywordPT?>:</label>
        <select name="categorie" id="categorie">
            <?php foreach ($list as $cat): ?>
                <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
            <?php endforeach; ?>  
        </select>
    </div>
    <input type="submit" value="Adicionar">
</form>