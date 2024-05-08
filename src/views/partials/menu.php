<style>
    .menu-container {
        background-color: #040F0F;
        display: flex;
        flex-direction: column;
        padding: 1rem;
        border-radius: 1rem;
        position: fixed;
        top: 50%;
        left: 2%;
        color: white;
        gap: 1rem;
    }

    .menu-item {
        color: #EE6055;
    }

</style>
<div class="menu-container">
    <a class="menu-item" href="<?=$base?>"><i>- Listagem</i></a>
    <a class="menu-item" href="<?=$base.'/list/add'?>"><i>+ Lista</i></a>
    <a class="menu-item" href="<?=$base.'/categorie/add'?>"><i>+ Categorias</i></a>
    <a class="menu-item" href="<?=$base.'/item/add'?>"><i>+ Items</i></a>
</div>  