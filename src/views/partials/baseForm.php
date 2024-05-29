<?php $render('header', ['title' => $title]); ?>
<style>
    form {
        display: flex;
        gap: 1rem; 
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        padding: 1rem;
        border-radius: .5rem;
        font-size: 1.2rem;
    }

    form div {
        position: relative;
    }

    label {
        background-color: #fff;
        opacity: 0;
        font-weight: 600;
        position: absolute;
        top: 25%;
        left: 5%;
        transition: ease .5s all;
    }

    input[type='text']:focus + label {
        opacity: 1;
        top: -25%;
        left: 2%;s
    }
    
    input[type='text']{
        border: 1px solid #02735E;;
        background-color: #fff;
        width: 90%;
        padding: 1rem;
        border-radius: 0.5rem;
        cursor: pointer;
        font-size: 1.3rem;
        font-weight: 600;
    }

    input[type='text']:focus{
        outline: none;
    }

    div:hover > input[type='text']::placeholder {
        transition: ease .5s all;
        opacity: 0;
    }
        
    input[type='submit'] {
        font-size: 1rem;
        border-radius: 0.2rem;
        padding: .5rem;
        background-color: #0CF25D; 

    }

    input[type='submit']:hover {
        cursor: pointer;
        transition: ease-in 0.2s;
        box-shadow: 5px 5px 0px 1px #000000;
    }
    
</style>
<h2><?=$keywordPT?></h2>
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