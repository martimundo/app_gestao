<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

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

    Route::get('/adm', function(){return "Acesso ao Painel Adm";})->name('app.adm');
    Route::get('/clientes', function () {return 'Área de Clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){return "Cadastro de produtos";})->name('app.produtos');
});

//ROTA DE FALLBACK...
Route::fallback(function () {
    echo 'Não foi possível acessar o sistema. <a href="' . route('site.index') . '">Clique aqui</a> para voltar ao inicio do sistema';
});
