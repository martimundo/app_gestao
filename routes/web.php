<?php


use Illuminate\Support\Facades\Route;



//ROTAS NOMEADOS PASSAMOS O HELPER DO LARAVAEL ->NAME()....
Route::get('/', 'PrincipalController@index')
    ->name('site.index');
    //->middleware('log.acesso');
//usando um middleware criado para teste

Route::get('/sobrenos', 'SobreNosController@index')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@index')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('salvar.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//AGRUPAMENTOS DE ROTAS ADM...PARA O AGRUPAMENTO DE ROTAS USAMOS A SIGLA PREFIX.
Route::middleware('autenticacao:padrao,.administrador')->prefix('/app')->group(function () {

    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@logout')->name('app.sair');    
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/create', 'FornecedorController@create')->name('app.fornecedor.create');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/editar/{id}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/store', 'FornecedorController@store')->name('app.fornecedor.store');
    
    //produtos
    Route::resource('produto','ProdutoController');

    //unidades
    Route::resource('unidade', 'UnidadeController');

    //Detalhes do Produto
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    //Cliente
    Route::resource('cliente','ClienteController');

    //Pedido
    Route::resource('pedido', 'PedidoController');

    //Pedido Produto
    Route::resource('pedido-produto', 'PedidoProdutoController');
});

//ROTA DE FALLBACK...
Route::fallback(function () {
    
});
