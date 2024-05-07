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
        <label for="desc">Descrição  <?=$keywordPT?>:</label>
        <input type="text" name="desc" id="desc"/>
    </div>
    <input type="submit" value="Adicionar">
</form>