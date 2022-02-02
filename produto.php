<?php
require_once("cabecalho.php");
require_once("conexao.php");
// require_once("cabecalho-busca.php");
$tem_cor;
?>

<?php 
//recuperar o nome do produto para filtrar os dados dele
$produto_get = @$_GET['nome'];

?>

<?php 
//trazer dados do produto
$query = $pdo->query("SELECT * FROM produtos where nome_url = '$produto_get' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$nome = $res[0]['nome'];
$imagem = $res[0]['imagem'];
$sub_cat = $res[0]['sub_categoria'];
$valor = $res[0]['valor'];
$estoque = $res[0]['estoque'];
$descricao = $res[0]['descricao'];
$desc_longa = $res[0]['descricao_longa'];
$tipo_envio = $res[0]['tipo_envio'];
$palavras = $res[0]['palavras'];
$ativo = $res[0]['ativo'];
$peso = $res[0]['peso'];
$largura = $res[0]['largura'];
$altura = $res[0]['altura'];
$comprimento = $res[0]['comprimento'];
$modelo = $res[0]['modelo'];
$valor_frete = $res[0]['valor_frete'];
$nome_cat = $res[0]['categoria'];
$promocao = $res[0]['promocao'];
$id_produto = $res[0]['id'];

if($modelo == ""){
    $modelo = "Nenhum";
}

if($promocao == 'Sim'){
    $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id_produto' ");
    $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
    $valor = $resp[0]['valor'];
    $desconto = $resp[0]['desconto'];
    
 }
 $valor = number_format($valor, 2, ',', '.');
?>

<!-- Product Details Section Begin -->
<section id="produto" class="product-details spad">
    <div class="container">
        <div class="produto-content">
            <div class="produto-galeria">
                <div
                    style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                    class="swiper mySwiper2"
                    >
                    <div class="swiper-wrapper">
                        <div class="swiper-slide produto">
                        <img class="product__details__pic__item--large"
                        src="img/produtos/<?php echo $imagem ?>" alt="">
                        </div>
                        <div class="swiper-slide produto">
                        <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                        </div>
                        <div class="swiper-slide produto">
                        <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                        </div>
                        <div class="swiper-slide produto">
                        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                        </div>
                        
                    </div>
                    <div class="swiper-button-next produto"></div>
                    <div class="swiper-button-prev produto"></div>
                </div>
                <div thumbsSlider="" class="swiper myProductSlide">
                    <div class="swiper-wrapper">

                <?php 
                    $query = $pdo->query("SELECT * FROM imagens where id_produto = '$id_produto' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }

                        $imagem_prod = $res[$i]['imagem'];
                ?>

                        <div class="swiper-slide">
                        <img data-imgbigurl="img/produtos/detalhes/<?php echo $imagem_prod ?>"
                        src="img/produtos/detalhes/<?php echo $imagem_prod ?>" alt="">
                        </div>
                        <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                        </div>
                        <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                        </div>
                        <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                        </div> 

                        

                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="produto-info-box">
                <h3><?php echo $nome ?></h3>
                <span>código</span>
                <div class="preco">
                    <h2>R$ <?php echo $valor ?></h2>
                    <p>ou 10x de R$ R$4,90 sem juros</p>
                </div>
                <!-- <div class="box-cor">
                    <?php 
                        $query2 = $pdo->query("SELECT * from carac_prod where id_prod = '$id_produto' ");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                        for ($i=0; $i < count($res2); $i++) { 
                            foreach ($res2[$i] as $key => $value) {
                            }

                            $id_carac = $res2[$i]['id_carac'];
                            $id_carac_prod = $res2[$i]['id'];
                            $query3 = $pdo->query("SELECT * from carac where id = '$id_carac' ");
                        $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                        $nome_carac = $res3[0]['nome'];
                        if($nome_carac == 'Cor'){
                            @$tem_cor = 'Sim';
                        }
                        ?>  
                    
                        <select class="form-control form-control-sm mt-2" name="produto-categoria" id="produto-categoria">
                                    <?php 
                                    echo "<option value='".$nome_carac."' >Selecionar " . $nome_carac . "</option>"; 
                                
                                    $query4 = $pdo->query("SELECT * from carac_itens where id_carac_prod = '$id_carac_prod'");
                                    $res4 = $query4->fetchAll(PDO::FETCH_ASSOC);
                                    for ($i2=0; $i2 < count($res4); $i2++) { 
                                        foreach ($res4[$i2] as $key => $value) {
                                        }
                                        echo "<option value='".$res4[$i2]['id']."' >" . $res4[$i2]['nome'] . "</option>"; 
                                    }
                                ?>
                                </select>
                            <?php } ?>
                            </div> -->
                
                    <div class="tamanho">
                        <p>Selecione o Tamanho</p>
                        <div class="tamanhos">
                            <input type="checkbox"class="input-tamanho-produto" name="tamanho-p" id="tamanho-p" value="p">
                            <label for="tamanho-p"></label>
                            <input type="checkbox"class="input-tamanho-produto" name="tamanho-m" id="tamanho-m" value="m">
                            <label for="tamanho-m"></label>
                            <input type="checkbox"class="input-tamanho-produto" name="tamanho-g" id="tamanho-g" value="g">
                            <label for="tamanho-g"></label>
                            <input type="checkbox"class="input-tamanho-produto" name="tamanho-gg" id="tamanho-gg" value="gg">
                            <label for="tamanho-gg"></label>
                        </div>
                    </div>
                    <!-- <p><?php echo $descricao ?></p> -->
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <span>Quantidade</span>
                            <div class="pro-qty">
                                <input type="text" value="1" id="produto-quantidade">
                            </div>
                        </div>
                    </div>
                <div class="texto-frete">
                    <p>
                        <?php echo $texto_destaque ?>
                    </p>
                </div>
                <div class="botao">
                    <button>
                    <img src="img/icons/cesto-produto.png" alt="icone cesto de produto">
                    SELECIONE O TAMANHO
                    </button>
                </div>
                
                <div class="produto-social">
                    <p>Compartilhe</p>
                    <div class="social-box">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <!-- <a href="#"><img src="img/icons/instagram-red.png" alt="Logo Instagram"></a> -->
                        <a href="#"><img src="img/icons/logo-facebook.png" alt="Logo Facebook"></a>
                    </div>
                </div>
                <div class="produto-calcular-frete">
                    <p>Consultar Frete e Entrega</p>
                    <input type="text" name="cep-calcular-frete" placeholder="13400-000">
                    <span>Não sei meu frete</span>
                    <button>CALCULAR FRETE</button>
                </div>
            </div>
        </div>
    </div>
</section> 
<section id="produto-descricao">
    <div class="container">
        <div class="produto-descricao">
                <h3>Descrição do Produto</h3>
                <p><?php echo $desc_longa ?></p>
        </div>
        <div class="produto-especificacao">
            <h3>Especificações Técnicas</h3>
            <table class="produto-tabela">
                <tbody>
                    <tr>
                        <th>Categoria</th>
                        <td><?php echo "#####" ?></td>
                    </tr>
                    <tr>
                        <th>Cor</th>
                        <td><?php echo "#####" ?></td>
                    </tr>
                    <tr>
                        <th>Gênero</th>
                        <td><?php echo "#####" ?></td>
                    </tr>
                    <tr>
                        <th>Detalhes do produto</th>
                        <td><?php echo $descricao ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
     
<section class="produto-relacionado">
    <div class="container">
        <h2>Quem viu este produto comprou estes também...</h2>
         
        <div class="product-container">
                <div class="swiper myProducts">
                    <div class="swiper-wrapper">
                        <?php 
                            $query = $pdo->query("SELECT * FROM produtos order by vendas desc limit 8 ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                            foreach ($res[$i] as $key => $value) {
                            }

                            $nome = $res[$i]['nome'];
                            $valor = $res[$i]['valor'];
                            $nome_url = $res[$i]['nome_url'];
                            $imagem = $res[$i]['imagem'];
                            $promocao = $res[$i]['promocao'];
                            $id = $res[$i]['id'];

                            $valor = number_format($valor, 2, ',', '.');

                            if($promocao == 'Sim'){
                                $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                                $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                                $valor_promo = $resp[0]['valor'];
                                $desconto = $resp[0]['desconto'];
                                $valor_promo = number_format($valor_promo, 2, ',', '.');

                        ?>
    
                            <div class="swiper-slide card">
                                <div class="imgbox">
                                    <img src="img/produtos/<?php echo $imagem ?>" alt="">
                                    <ul class="action">
                                        <!-- <li>
                                            <i class="fas fa-heart"></i>
                                            <span>Add aos Favoritos</span>
                                        </li> -->
                                        <li>
                                            <i class="fas fa-shopping-cart"></i>
                                            <span>Add ao Carrinho</span>
                                        </li>
                                        <li>
                                        <a href="produto-<?php echo $nome_url ?>"><i class="fas fa-eye"></i></a>
                                            <span>Ver Detalhes</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="productName">
                                        <h3><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></h3>
                                        <p>Masculino</p>
                                    </div>
                                    <div class="price-rating">
                                        <h2>R$ <?php echo $valor ?></h2>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas grey fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }else{ ?>


                        <div class="swiper-slide card">
                            <div class="imgbox">
                                <img src="img/produtos/<?php echo $imagem ?>" alt="">
                                <ul class="action">
                                    <!-- <li>
                                        <i class="fas fa-heart"></i>
                                        <span>Add aos Favoritos</span>
                                    </li> -->
                                    <li>
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>Add ao Carrinho</span>
                                    </li>
                                    <li>
                                    <a href="produto-<?php echo $nome_url ?>"><i class="fas fa-eye"></i></a>
                                        <span>Ver Detalhes</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="productName">
                                    <h3><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a></h3>
                                    <p>Masculino</p>
                                </div>
                                <div class="price-rating">
                                    <h2>R$ <?php echo $valor ?></h2>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas grey fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } } ?>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <a class="link-ver-todos" href="produtos.php">Ver Todos</a>
    </div>
</section>


<section id="promocao">
    <div class="container">
        <div class="content">
            <div class="headline">
                <h4>Kits / Promoções</h4>
                <div class="links">
                    <?php 
                        $query = $pdo->query("SELECT * FROM categorias order by nome asc ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i=0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];

                        $nome_url = $res[$i]['nome_url'];
                        
                        ?>
                        <a href="sub-categoria-de-<?php echo $nome_url ?>"><?php echo $nome ?></a>

                    <?php } ?>
                </div>
            </div>

            <div class="product-container">
                <div class="swiper myProducts">
                    <div class="swiper-wrapper">

                    <?php 
                            $query = $pdo->query("SELECT * FROM produtos order by vendas desc limit 8 ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                            foreach ($res[$i] as $key => $value) {
                            }

                            $nome = $res[$i]['nome'];
                            $valor = $res[$i]['valor'];
                            $nome_url = $res[$i]['nome_url'];
                            $imagem = $res[$i]['imagem'];
                            $promocao = $res[$i]['promocao'];
                            $id = $res[$i]['id'];

                            $valor = number_format($valor, 2, ',', '.');

                            if($promocao == 'Sim'){
                                $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id' ");
                                $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
                                $valor_promo = $resp[0]['valor'];
                                $desconto = $resp[0]['desconto'];
                                $valor_promo = number_format($valor_promo, 2, ',', '.');

                        ?>
    
                            <div class="swiper-slide card">
                                <div class="imgbox">
                                    <img src="img/produtos/<?php echo $imagem ?>" alt="">
                                    <ul class="action">
                                        <!-- <li>
                                            <i class="fas fa-heart"></i>
                                            <span>Add aos Favoritos</span>
                                        </li> -->
                                        <li>
                                            <i class="fas fa-shopping-cart"></i>
                                            <span>Add ao Carrinho</span>
                                        </li>
                                        <li>
                                        <a href="produto-<?php echo $nome_url ?>"><i class="fas fa-eye"></i></a>
                                            <span>Ver Detalhes</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="productName">
                                        <h3><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a></h3>
                                        <p>Masculino</p>
                                    </div>
                                    <div class="price-rating">
                                        <h2>R$ <?php echo $valor ?></h2>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas grey fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }else{ ?>


                        <div class="swiper-slide card">
                            <div class="imgbox">
                                <img src="img/produtos/<?php echo $imagem ?>" alt="">
                                <ul class="action">
                                    <!-- <li>
                                        <i class="fas fa-heart"></i>
                                        <span>Add aos Favoritos</span>
                                    </li> -->
                                    <li>
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>Add ao Carrinho</span>
                                    </li>
                                    <li>
                                    <a href="produto-<?php echo $nome_url ?>"><i class="fas fa-eye"></i></a>
                                        <span>Ver Detalhes</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="productName">
                                    <h3><a href="produto-<?php echo $nome_url ?>"><?php echo $nome ?></a></h3>
                                    <p>Masculino</p>
                                </div>
                                <div class="price-rating">
                                    <h2>R$ <?php echo $valor ?></h2>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas grey fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } } ?>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <a class="link-ver-todos" href="produtos.php">Ver Todos</a>
        </div>
        <div class="banner">
            <img src="img/banner/banner-front-pequeno 1.png" alt="Banner">
        </div>
    </div>
</section>

<!-- FIM PROMOÇÃO -->



<?php
require_once("newsletter.php");
require_once("rodape.php");
?>