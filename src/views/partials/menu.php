<style>
    .menu-container {
        background-color:#034159;
        box-shadow: 1px 3px 15px 2px #000000;
        display: flex;
        flex-direction: column;
        padding: 1rem;
        border-radius: 1rem;
        height: 0.1rem;
        position: fixed;
        top: 1%;
        left: 1%;
        color: white;
        gap: 1rem;
    }

    
    .menu-container:hover{
        box-shadow: 1px 3px 15px 2px #fff;
        height: auto;
        transition: ease-in .8s;
    }
    .menu-container:hover > .menu-item {
        opacity: 1;
        transition: ease-out 1s;
    }

    .menu-item {
        opacity: 0;
        color: #02735E;
        
        
    }

   

</style>
<div class="menu-container">
    <a class="menu-item" href="<?=$base?>"><i>- Listagem</i></a>
    <a class="menu-item" href="<?=$base.'/list/add'?>"><i>+ Lista</i></a>
    <a class="menu-item" href="<?=$base.'/categorie/add'?>"><i>+ Categorias</i></a>
    <a class="menu-item" href="<?=$base.'/item/add'?>"><i>+ Items</i></a>
</div>  