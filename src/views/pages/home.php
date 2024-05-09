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
        border: 1px solid #474747;
        background-color: #faebd79d;
        opacity: .5;
        display: flex;
        flex-direction: column;
        padding: 1rem;
        height: 30vh;
       
        border-radius: .2rem;
    }

    .list-item:hover{
        background-color: #474747;
        cursor: pointer;
        box-shadow: 0px 10px 6px 0px black;
        opacity: 1;
    }

    .title{
        font-size: 2.3rem;
        color: #000;
    }

    .paragraph {
        font-size: 1.5rem;
        color: #FFF;
        visibility: hidden;

    }

    .list-item:hover > .paragraph {
        visibility: visible;
    }

    .list-item:hover > .title {
        color: #EE6055;
    }
    
    .link-item{
        transition: 0.2s;
    }


    
</style>


<div class="list-container">
    <?php foreach ($list as $item): ?>
        <a class="link-item"href="<?=$base.'/'.'list'.'/'.$item['id']?>">
            <div class="list-item" id="<?=$item['id']?>">
                <h3 class="title"><?=$item['name']?></h3>
                <p class="paragraph">
                    <?=$item['description']?>
                </p>

            </div>
        </a>
    <?php endforeach; ?>    
</div>

<?php $render('footer'); ?>