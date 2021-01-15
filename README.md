# Start Aplicação Multitenant

Base para uma aplicação MULTITENANT, contendo toda a parte administrativa para gerenciamento de tenant.

<br>

##### Recursos
Laravel 8
Jetstream + Livewire
TailwindCss

<br>

##### Features
- [x] Registro de Tenant
- [x] Gestão de usuários por Tenant
- [ ] ACL "Módulo => Permissões"
- [ ] Gerenciar Informações do Tenant
    - Logo
    - Nome Fantasia
    - E-mail

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
```

<br>

Methodo responsável por filtrar o tenant
**Deve ser colocado em todos os módulos que precisam de filtro por tenant*

```php
# App\Models\User

    protected static function booted()
    {   
        if(auth()->check()) { // verifica se o usuário esta logado
            static::addGlobalScope(new TenantScope); // Carrega classe responsável por filtrar o tenant
        }        
    }