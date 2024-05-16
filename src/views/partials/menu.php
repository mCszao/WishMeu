<style>
    .menu-container {
        background-color:#034159;
        box-shadow: 1px 3px 15px 2px #000000;
        display: flex;
        padding: 1rem;
        border-radius: 0 0 1rem 0;
        height: auto;
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        color: white;
        gap: 1rem;
    }

    
    .menu-container:hover{
        box-shadow: 1px 3px 15px 2px #fff;

        transition: ease-in .8s;
    }
    

    .menu-item {
        opacity: 1;
        color: #02735E;
        
        
    }

   

</style>
<div class="menu-container">
    <a class="menu-item" href="<?=$base?>"><i>Página Inicial</i></a>
    <a class="menu-item" href="<?=$base.'/list/add'?>"><i>Nova Lista</i></a>
    <a class="menu-item" href="<?=$base.'/categorie/add'?>"><i>Nova Categorias</i></a>
    <a class="menu-item" href="<?=$base.'/item/add'?>"><i>Novo Item</i></a>
</div>  