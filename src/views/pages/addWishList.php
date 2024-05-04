<?php $render('header', ['title' => 'Nova Wish List, Meu']); ?>

<h2>Nova Lista</h2>

<form style=" display: flex; gap: 0.5rem; flex-direction: column" method="POST" action="<?=$base;?>/list/save">
    <div>
        <label for="name">Nome da Lista:</label>
        <input type="text" name="name" id="name" />
    </div>
    <div>
        <label for="desc">Descrição da Lista:</label>
        <input type="text" name="desc" id="desc"/>
    </div>
    <input type="submit" value="Adicionar">
</form>

<?php $render('footer');?>