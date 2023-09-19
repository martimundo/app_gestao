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
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', 'ProdutoController@index')->name('app.produto');
    Route::get('/create', 'FornecedorController@create')->name('app.fornecedor.create');
    Route::get('/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');

    Route::post('/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/store', 'FornecedorController@store')->name('app.fornecedor.store');
});

//ROTA DE FALLBACK...
Route::fallback(function () {
    echo 'Não foi possível acessar o sistema. <a href="' . route('site.index') . '">Clique aqui</a> para voltar ao inicio do sistema';
});
