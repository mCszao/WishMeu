<?php $render('header', ['title' => 'Home']); ?>

<style>
.list-container {
    margin: 10px auto;
    display: flex;
    flex-direction: column;
    height: 80vh;
    gap: 1rem;
    
}

.list-item{
    border: 1px solid #000000;
    background-color: #fff;
    opacity: .5;
    display: flex;
    flex-direction: column;
    padding: 1rem;
    height: 30vh;
    
    border-radius: .2rem;
}

.list-item:hover{
    background-color: #0CF25D;
    cursor: pointer;
    box-shadow: 0px 10px 6px 0px black;
    opacity: 1;
}

.title{
    font-size: 2.3rem;
    color: #000;
}

.paragraph {
    font-size: 2rem;
    color: #02735E;
    visibility: hidden;

}

.list-item:hover > .paragraph {
    visibility: visible;
}

.list-item:hover > .title {
    color: #fff;
}

.link-item{
    transition: 0.2s;
}

.no-items{
    margin-top: 10rem;
    padding: 1rem;
    background-color: #fff
}

.item-container {
    display: flex;
    flex-direction: column;
}
.img-edit {
    opacity: 0;
    cursor: pointer;
}
.img-edit:hover {
    transform: scale(1);
}
.item-container:hover > .img-edit {
    opacity: 1;
}

    
</style>
<script src="<?=$base.'/js/list.js'?>"></script>
<?php if(count($list) > 0):?>
    <div class="list-container">
        <?php foreach ($list as $item): ?>
            <div class="item-container">
                <a class="img-edit" href="<?=$base.'/'.'list'.'/add/'.$item['id']?>">
                    <img src="https://icons.iconarchive.com/icons/arturo-wibawa/akar/128/edit-icon.png" width="24" height="24" >
                </a>
                <a class="link-item" href="<?=$base.'/'.'list'.'/'.$item['id']?>">
                    <div class="list-item" id="<?=$item['id']?>">
                        <h3 class="title" id="<?='title'.$item['id']?>" ><?=$item['name']?></h3>
                        <p class="paragraph">
                            <?=$item['description']?>
                        </p>

                    </div>
                </a>
            </div>
        <?php endforeach; ?>    
    </div>
<?php else: ?>
    <h2 class="no-items">Sem listas cadastradas. Clique em <a class="link-item" href="<?=$base.'/list/add'?>">+Listas</a> para adicionar a sua primeira lista!</h2>
<?php endif;?>
<?php $render('footer'); ?>