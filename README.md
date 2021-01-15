# Start Aplicação Multitenant

Base para uma aplicação MULTITENANT, contendo toda a parte administrativa para gerenciamento de tenant.

<br>

##### Recursos
Laravel 8
Jetstream + Livewire
TailwindCss

<br>

##### Módulos
- [ ] Usuários "Padrão"
        - Gerencia dados Pessoais
        - Troca Senha
<br>
- [ ] Clientes
- [ ] Produtos
- [ ] Gateway de Pagamentos

<br>

##### Features
- [ ] Registro de Tenant
- [ ] Gestão de usuários por Tenant
- [ ] ACL

<br>

Gera e faz a inserção automatica do uuid ao cadastrar um novo Tenant "Empresa"

```php
# App\Models\Tenant

    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }