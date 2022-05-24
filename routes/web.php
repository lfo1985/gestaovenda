<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ------------------------------- Rodas para a entidade Cliente -------------------------------
// Abre a página inicial de clientes
Route::get('/clientes', [App\Http\Controllers\clienteController::class, 'index'])->name('clientes');
// Abre o formulário para cadastrar
Route::get('/clientes/cadastrar', [App\Http\Controllers\clienteController::class, 'create'])->name('cadastrarClientes');
// Abre o formulário para editar
Route::get('/clientes/editar/{id}', [App\Http\Controllers\clienteController::class, 'edit'])->name('editarClientes');
// Realiza o cadastro do cliente
Route::post('/clientes/realizaCadastro', [App\Http\Controllers\clienteController::class, 'store'])->name('realizaCadastroClientes');
// Realiza a edição do cliente
Route::post('/clientes/realizaEdicao/{id}', [App\Http\Controllers\clienteController::class, 'update'])->name('realizaEdicaoClientes');
// Realiza a exclusão do cliente
Route::get('/clientes/apagar/{id}', [App\Http\Controllers\clienteController::class, 'destroy'])->name('apagarClientes');

// ------------------------------- Rota para a entidade Produto -------------------------------
// Abre a página inicial de produtos
Route::get('/produtos', [App\Http\Controllers\produtoController::class, 'index'])->name('produtos');
// Abre o formulário para cadastrar
Route::get('/produtos/cadastrar', [App\Http\Controllers\produtoController::class, 'create'])->name('cadastrarProdutos');
// Abre o formulário para editar
Route::get('/produtos/editar/{id}', [App\Http\Controllers\produtoController::class, 'edit'])->name('editarProdutos');
// Realiza o cadastro do cliente
Route::post('/produtos/realizaCadastro', [App\Http\Controllers\produtoController::class, 'store'])->name('realizaCadastroProdutos');
// Realiza a edição do cliente
Route::post('/produtos/realizaEdicao/{id}', [App\Http\Controllers\produtoController::class, 'update'])->name('realizaEdicaoProdutos');
// Realiza a exclusão do cliente
Route::get('/produtos/apagar/{id}', [App\Http\Controllers\produtoController::class, 'destroy'])->name('apagarProdutos');
// Retorna os dados do produto
Route::get('/produto/dados/{id}', [App\Http\Controllers\produtoController::class, 'show'])->name('dadosProduto');

// ------------------------------- Rota para a entidade Venda -------------------------------
// Abre o formulário para lançar a venda
Route::get('/vendas/registrar', [App\Http\Controllers\vendaController::class, 'create'])->name('registrarVenda');
// Realiza a venda
Route::post('/vendas/realizarRegistroVenda', [App\Http\Controllers\vendaController::class, 'store'])->name('realizarRegistroVenda');

// ------------------------------- Rotas para o relatório -------------------------------
Route::get('/vendas/relatorio', [App\Http\Controllers\itemvendaController::class, 'report'])->name('relatorioVenda');